<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Type_Session extends Authenticatable
{
    use Notifiable;

    protected $table      = 'type_sessions';
    protected $primaryKey = 'id_type_sessions';
   

}
