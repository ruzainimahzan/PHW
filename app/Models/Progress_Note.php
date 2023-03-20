<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Progress_Note extends Authenticatable
{
    use Notifiable;

    protected $table      = 'progress_note';
    protected $primaryKey = 'id_progress_note';
}
