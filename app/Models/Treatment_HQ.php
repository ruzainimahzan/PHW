<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Treatment_HQ extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'treatment_hq';
    protected $primaryKey = 'id_treatment';
   
}
