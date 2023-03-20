<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Medication_Dosage extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'medical_chart_routine';
    protected $primaryKey = 'id_routine';
   
}
