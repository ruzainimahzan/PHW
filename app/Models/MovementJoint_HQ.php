<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MovementJoint_HQ extends Authenticatable
{
    use Notifiable;

    protected $table      = 'movement_joint_hq';
    protected $primaryKey = 'id_movement_joint';
}