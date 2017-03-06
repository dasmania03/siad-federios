<?php

namespace Siad\CV2017;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'cv17_inscriptions';

    protected $fillable = [
        'athlete_id',
        'product_id',
        'horario',
        'dias',
        'discount',
        'paid_total',
        'observations',
        'code_exo',
        'status',
        'user_id'
    ];
    
    // Una inscripcon puede tener solo una ficha
    public function athlete(){
        return $this->belongsTo('Siad\CV2017\Athlete');
    }

    // Una inscripcion puede tener solo un Producto
    public function product(){
        return $this->belongsTo('Siad\CV2017\Product');
    }
    
    // Una inscripcion tiene un Usuario responsable
    public function user() {
        return $this->belongsTo('Siad\User');
    }

    // Una inscripcion puede estar solo en una venta
    public function venta() {
        return $this->hasOne('Siad\CV2017\Venta');
    }

    // =========== FUNCIONES SCOPE ===============
    public function scopeTotalInscription($query) {
        return $query->where('status', '=', '1')
            ->orWhere('status', '=', '3')
            ->orWhere('status', '=', '4')
            ->count();
    }
    
    public function scopeTotalInscriptionFree($query) {
        return $query->where('status', '=', '1')->count();
    }

    public function scopeTotalInscriptionPaid($query) {
        return $query->where('status', '=', '3')->count();
    }

    public function scopeTotalInscriptionExo($query) {
        return $query->where('status', '=', '4')->count();
    }

    public function scopeSaleWithoutDiscount($query) {
        return $query->where('status', '=', '3')
            ->where('discount', '=', '0')->sum('paid_total');
    }

    public function scopeSaleDiscount30($query) {
        return $query->where('status', '=', '3')
            ->where('discount', '=', '1')->sum('paid_total');
    }

    public function scopeSaleDiscount50($query) {
        return $query->where('status', '=', '3')
            ->where('discount', '=', '2')->sum('paid_total');
    }
}
