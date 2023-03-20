<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Treatment extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'treatment';
    protected $primaryKey = 'id_treatment';

    ///ada masa nanti aku tambah fillable senang update boleh banyak cara
   
}
