<?php

namespace Company\Attendance\Components;

use Cms\Classes\ComponentBase;
use Company\Attendance\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Winter\Storm\Exception\ValidationException;
use Illuminate\Support\Facades\Session;

class Register extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Register',
      'description' => 'Employee registration form'
    ];
  }

  public function onRegister()
  {
    $data = post();
    $validator = Validator::make($data, [
      'name' => 'required|min:2',
      'email' => 'required|email|unique:company_attendance_employees',
      'password' => 'required|min:6|confirmed',
    ]);
    if ($validator->fails()) {
      throw new ValidationException($validator);
    }

    $user = new Employee();
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = $data['password'];
    $user->save();

    Session::put('employee_id', $user->id);
    return Redirect::to('/presensi');
  }
}
