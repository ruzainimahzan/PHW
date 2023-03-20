<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Progress_Note_Details extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'progress_note_details';
    protected $primaryKey = 'id_pn_detail';
   
}
