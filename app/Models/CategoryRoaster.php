<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class CategoryRoaster extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'category_roaster';
    protected $primaryKey = 'id';
   
}
