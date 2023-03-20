<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Diagnose_HQ extends Authenticatable
{
    use Notifiable;


    protected $table      = 'diagnose_hq';
    protected $primaryKey = 'id_diagnose';
    protected $fillable = ['id_patients','doctor_diagnose','doctor_management','problem','observation','palpation','current_history','past_history','pain_scale','area','nature','agg','ease','hours','irrirability_id','general_health','pmhx_surgery','medication_steroid','mri_xray','occupation_recreation','neurological_motor','neurological_seasation','neurological_reflexes','short_term_goals','long_term_goals','physiotherapist_impression','plan_of_treatment','special_test', 'clearing_test_other_joins'];
}
