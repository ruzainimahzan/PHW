<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Report extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'report_diagnose';
    protected $primaryKey = 'id_report_diagnose';
   
}
