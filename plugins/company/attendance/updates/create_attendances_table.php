<?php

namespace Company\Attendance\Updates;

use Illuminate\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateAttendancesTable extends Migration
{
  public function up()
  {
    Schema::create('company_attendance_attendances', function ($table) {
      $table->increments('id');
      $table->integer('employee_id')->unsigned()->index();
      $table->date('date')->index();
      $table->timestamp('clock_in_at')->nullable();
      $table->timestamp('clock_out_at')->nullable();
      $table->string('clock_in_note')->nullable();
      $table->string('clock_out_note')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('company_attendance_attendances');
  }
}
