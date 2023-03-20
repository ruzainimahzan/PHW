<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
}
