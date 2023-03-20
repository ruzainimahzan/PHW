<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PatientRelative extends Authenticatable
{
    use Notifiable;
   
    protected $table      = 'relative_patients';
    protected $primaryKey = 'id_rel_patients';
    
}
