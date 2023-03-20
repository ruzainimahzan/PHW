<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Role extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'role';
    protected $primaryKey = 'id';
   
}
