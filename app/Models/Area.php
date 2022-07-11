<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación de 1 a muchos
    public function areaSectors(){
        return $this->hasMany(AreaSector::class);
    }
    
    //relación de 1 a muchos inversa
    public function cantidadAreasP(){
        return $this->hasMany(CantidadArea::class,'id_padre');
    }
    public function cantidadAreasH(){
        return $this->hasMany(cantidadArea::class,'id_hijo');
    }
}
