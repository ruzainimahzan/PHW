<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class RoasterList extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'roaster_list';
    protected $primaryKey = 'id_roaster_list';
   
}
