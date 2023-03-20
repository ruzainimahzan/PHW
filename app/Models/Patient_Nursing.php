<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient_Nursing extends Authenticatable
{
    use Notifiable;

    protected $table      = 'patients_nursing';
    protected $primaryKey = 'id_patients';
}
