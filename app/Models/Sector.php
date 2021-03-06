<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //ralación de 1 a muchos
    public function areaSectors(){
        return $this->hasMany(AreaSector::class);
    }
    //relación de 1 a muchos inversa
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
}
