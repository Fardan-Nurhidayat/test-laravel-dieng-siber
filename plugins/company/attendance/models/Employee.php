<?php

namespace Company\Attendance\Models;

use Winter\Storm\Database\Model as BaseModel;
use Winter\Storm\Database\Traits\Validation;

class Employee extends BaseModel
{
  use Validation;

  protected $table = 'company_attendance_employees';
  protected $guarded = [];
  protected $hidden = ['password'];

  public $rules = [
    'name' => 'required|min:2',
    'email' => 'required|email|unique:company_attendance_employees',
    'password' => 'required|min:6',
  ];

  public $hasMany = [
    'attendances' => [Attendance::class, 'key' => 'employee_id']
  ];

  public function setPasswordAttribute($value)
  {
    if (!$value) return;
    $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
  }

  public static function attemptLogin(string $email, string $password): ?self
  {
    /** @var self|null $user */
    $user = self::where('email', $email)->first();
    if ($user && password_verify($password, $user->getOriginal('password'))) {
      return $user;
    }
    return null;
  }
}
