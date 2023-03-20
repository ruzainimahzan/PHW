<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Assigned extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'assigned';
    protected $primaryKey = 'id_assigned';
   
}
