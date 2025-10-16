<?php

namespace Company\Attendance\Components;

use Cms\Classes\ComponentBase;
use Company\Attendance\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Winter\Storm\Exception\ValidationException;
use Illuminate\Support\Facades\Session;

class Login extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Login',
      'description' => 'Employee login form'
    ];
  }

  public function onLogin()
  {
    $data = post();
    $validator = Validator::make($data, [
      'email' => 'required|email',
      'password' => 'required',
    ]);
    if ($validator->fails()) {
      throw new ValidationException($validator);
    }

    $user = Employee::attemptLogin($data['email'], $data['password']);
    if (!$user) {
      throw new ValidationException(['email' => 'Invalid credentials']);
    }

    Session::put('employee_id', $user->id);
    return Redirect::to('/presensi');
  }

  public function onLogout()
  {
    Session::forget('employee_id');
    return Redirect::to('/login');
  }
}
