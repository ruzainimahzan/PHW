<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Payments extends Authenticatable
{
    use Notifiable;
   

    protected $table      = 'payments';
    protected $primaryKey = 'id_payment';

}
