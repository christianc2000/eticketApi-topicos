<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación de 1 a muchos inversa
    public function eventoLocalidad(){
        return $this->belongsTo(EventoLocalidad::class);
    }
    //relación de 1 a muchos
    public function cantidadAreas(){
        return $this->hasMany(CantidadArea::class);
    }
}
