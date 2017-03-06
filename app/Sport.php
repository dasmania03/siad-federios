<?php

namespace Siad;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = 'sport';

    protected $fillable = [
        'name'
    ];
    
    // Un deporte puede estar en varios productos
    public function products(){
        return $this->hasMany('Siad\CV2017\Product', 'id', 'sport_id');
    }
}
