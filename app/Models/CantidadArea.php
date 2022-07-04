<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CantidadArea extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación de 1 a muchos inversa
    public function areaP(){
        return $this->belongsTo(Area::class,'id','area_padre_id');
    }
    public function areaH(){
        return $this->belongsTo(Area::class,'id','area_hijo_id');
    }
    public function fecha(){
        return $this->belongsTo(Fecha::class);
    }
}
