<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class soap_method_HQ extends Authenticatable
{
    use Notifiable;
   
    protected $table      = 'summary_diagnose_hq';
    protected $primaryKey = 'id_summary_diagnose';
    
}
