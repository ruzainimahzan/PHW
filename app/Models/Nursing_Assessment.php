<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Nursing_Assessment extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'nursing_assessment_report';
    protected $primaryKey = 'id_assessment_report';
   
}
