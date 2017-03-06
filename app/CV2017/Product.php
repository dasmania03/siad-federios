<?php

namespace Siad\CV2017;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'cv17_products';

    protected $fillable = [
        'sport_id',
        'detail',
        'age_min',
        'age_max',
        'horarys',
        'days',
        'quotas',
        'price'
    ];

    //Un producto puede tener solo un deporte
    public function sport(){
        return $this->belongsTo('Siad\Sport');
    }

    //Un producto puede estar en varias inscripciones
    public function inscriptions(){
        return $this->hasMany('Siad\CV2017\Inscription', 'id', 'product_id');
    }
}
