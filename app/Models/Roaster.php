<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roaster extends Model
{
    protected $table      = 'roasters';
    protected $primaryKey = 'id';
    protected $fillable = ['id_staff','id_roaster_list','id_patients','day','clockin','clockout'];
}
