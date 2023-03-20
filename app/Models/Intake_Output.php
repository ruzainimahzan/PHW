<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Intake_Output extends Authenticatable
{
    use Notifiable;

    protected $table      = 'intake_output_chart';
    protected $primaryKey = 'id_intake_output';
}