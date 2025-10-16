<?php

namespace Company\Attendance\Models;

use Winter\Storm\Database\Model as BaseModel;
use Carbon\Carbon;
use Winter\Storm\Database\Traits\Validation;

class Attendance extends BaseModel
{
  use Validation;

  protected $table = 'company_attendance_attendances';
  protected $guarded = [];
  protected $dates = ['date', 'clock_in_at', 'clock_out_at', 'created_at', 'updated_at'];

  public $rules = [];

  public $belongsTo = [
    'employee' => [Employee::class]
  ];
}
