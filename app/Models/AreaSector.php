<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaSector extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación de 1 a muchos inversa
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function sector(){
        return $this->belongsTo(Sector::class);
    }
    public function eventoLocalidad(){
        return $this->belongsTo(EventoLocalidad::class);
    }

    
}
