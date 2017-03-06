<?php

namespace Siad\CV2017;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'cv17_agents';

    protected $fillable = [
        'identification',
        'first_name',
        'last_name',
        'full_name',
        'telephone',
        'email'
    ];

    //Un representante puede tener varios deportistas
    public function athletes(){
        return $this->hasMany('Siad\CV2017\Athlete', 'id', 'agent_id');
    }
}
