<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Diagnose_Nursing extends Authenticatable
{
    use Notifiable;


    protected $table      = 'diagnose_nursing';
    protected $primaryKey = 'id_diagnose';
   
}
