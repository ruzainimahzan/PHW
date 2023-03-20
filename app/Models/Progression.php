<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Progression extends Authenticatable
{
    use Notifiable;

    protected $table      = 'progression';
    protected $primaryKey = 'id_progression';
}