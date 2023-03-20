<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Nursing_Daily extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'nursing_daily_report';
    protected $primaryKey = 'id_daily_report';
   
}
