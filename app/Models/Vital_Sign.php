<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vital_Sign extends Authenticatable
{
    use Notifiable;

    protected $table      = 'vital_sign_form';
    protected $primaryKey = 'id_vital_sign';
}