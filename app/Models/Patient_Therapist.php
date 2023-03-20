<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient_Therapist extends Authenticatable
{
    use Notifiable;

    protected $table      = 'patients_therapist';
    protected $primaryKey = 'id_patients';
}
