<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoLocalidad extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación de 1 a muchos inversa
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
    //relación de 1 a muchos
    public function areaSectors(){
        return $this->hasMany(AreaSector::class);
    }
    public function fechas(){
        return $this->hasMany(Fecha::class);
    }
}
