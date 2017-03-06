<?php

namespace Siad\CV2017;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'cv17_ventas';

    protected $fillable = [
        'inscription_id',
        'price',
        'user_id'
    ];

    // Una venta puede tener solo una inscripcion
    public function inscription(){
        return $this->belongsTo('Siad\CV2017\Inscription');
    }

    // Una venta puede tener solo un user
    public function user(){
        return $this->belongsTo('Siad\User');
    }

    // FUNCIONES SCOPE
    public function scopeTotalSale($query) {
        return $query->sum('price');
    }

    public function scopeTodaySale($query) {

        return $query->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->sum('price');
    }
}
