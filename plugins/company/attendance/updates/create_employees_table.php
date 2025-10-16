<?php

namespace Company\Attendance\Updates;

use Illuminate\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateEmployeesTable extends Migration
{
  public function up()
  {
    Schema::create('company_attendance_employees', function ($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->string('password');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('company_attendance_employees');
  }
}
