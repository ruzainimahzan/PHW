<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transaction extends Authenticatable
{
    use Notifiable;
   
    protected $table      = 'transaction';
    protected $primaryKey = 'id';
    
}
