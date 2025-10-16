<?php

namespace Company\Attendance;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
  public function pluginDetails()
  {
    return [
      'name' => 'Attendance',
      'description' => 'Simple employee attendance (presensi) system with register/login and clock in/out.',
      'author' => 'Company',
      'icon' => 'icon-clock-o'
    ];
  }

  public function registerComponents()
  {
    return [
      'Company\\Attendance\\Components\\Register' => 'register',
      'Company\\Attendance\\Components\\Login' => 'login',
      'Company\\Attendance\\Components\\Presensi' => 'presensi',
    ];
  }
}
