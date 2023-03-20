<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class soap_method extends Authenticatable
{
    use Notifiable;
   
    protected $table      = 'summary_diagnose';
    protected $primaryKey = 'id_summary_diagnose';
    
}
