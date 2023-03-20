<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Monthly_Report extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'monthly_summary_report';
    protected $primaryKey = 'id_summary_report';
   
}
