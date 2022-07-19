<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación de 1 a muchos inversa
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    //relación de 1 a muchos
    public function eventoLocalidads(){
        return $this->hasMany(EventoLocalidad::class);
    }
    //relación de 1 a muchos polimorfica
    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
