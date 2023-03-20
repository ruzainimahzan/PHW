<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Report_HQ extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'report_diagnose_hq';
    protected $primaryKey = 'id_report_diagnose';
   
}
