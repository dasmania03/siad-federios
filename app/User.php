<?php

namespace Siad;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'avatar',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Un User puede estar en Muchas Fichas
    public function athletes() {
        return $this->hasMany('Siad\CV2017\Athlete');
    }

    // Un User puede estar en Muchas Inscripciones
    public function inscriptions() {
        return $this->hasMany('Siad\CV2017\Inscription');
    }

    // Un User puede estar en Muchas ventas
    public function ventas() {
        return $this->hasMany('Siad\CV2017\Venta');
    }
}
