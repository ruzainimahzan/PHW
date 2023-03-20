<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Nursing_Monthly extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'nursing_monthly_report';
    protected $primaryKey = 'id_monthly_report';
   
}
