<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Medication extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'medication_chart';
    protected $primaryKey = 'id_prescription';
   
}
