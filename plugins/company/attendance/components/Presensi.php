<?php

namespace Company\Attendance\Components;

use Cms\Classes\ComponentBase;
use Company\Attendance\Models\Employee;
use Company\Attendance\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Presensi extends ComponentBase
{
  public $employee;
  public $todayAttendance;
  public $history;

  public function componentDetails()
  {
    return [
      'name' => 'Presensi',
      'description' => 'Employee check-in/out and history'
    ];
  }

  public function onRun()
  {
    $this->prepareVars();
    if (!$this->employee) {
      return Redirect::to('/login');
    }
  }

  protected function prepareVars()
  {
    $id = Session::get('employee_id');
    $this->employee = $id ? Employee::find($id) : null;
    if ($this->employee) {
      $today = Carbon::today();
      $this->todayAttendance = Attendance::firstOrCreate([
        'employee_id' => $this->employee->id,
        'date' => $today->toDateString(),
      ]);
      $this->history = Attendance::where('employee_id', $this->employee->id)
        ->orderBy('date', 'desc')
        ->take(20)
        ->get();
    }
  }

  public function onClockIn()
  {
    $this->prepareVars();
    if (!$this->employee) return Redirect::to('/login');
    if (!$this->todayAttendance->clock_in_at) {
      $this->todayAttendance->clock_in_at = Carbon::now();
      $this->todayAttendance->clock_in_note = post('note');
      $this->todayAttendance->save();
    }
  }

  public function onClockOut()
  {
    $this->prepareVars();
    if (!$this->employee) return Redirect::to('/login');
    if (!$this->todayAttendance->clock_out_at) {
      $this->todayAttendance->clock_out_at = Carbon::now();
      $this->todayAttendance->clock_out_note = post('note');
      $this->todayAttendance->save();
    }
  }

  public function onLogout()
  {
    Session::forget('employee_id');
    return Redirect::to('/login');
  }
}
