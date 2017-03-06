<?php

namespace Siad\CV2017;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $table = 'cv17_athletes';

    protected $fillable = [
        'identification',
        'first_name',
        'last_name',
        'full_name',
        'birth_date',
        'age',
        'address',
        'telephone',
        'email',
        'size',
        'status_uniform',
        'gender',
        'type_disability',
        'agent_id',
        'user_id'
    ];

    // Un deportista puede tener un representante
    public function agent(){
        return $this->belongsTo('Siad\CV2017\Agent');
    }
    
    // Una ficha puede estar en varias inscripciones
    public function inscriptions(){
        return $this->hasMany('Siad\CV2017\Inscription');
    }

    // Una ficha tiene un unico User Responsable
    public function user() {
        return $this->belongsTo('Siad\User');
    }

    public function getNumInscriptionsAttribute(){
        return count($this->inscriptions);
    }
}
