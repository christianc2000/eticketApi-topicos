<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de 1 a muchos inversa

    //relación de 1 a muchos
    public function eventoLocalidads()
    {
        return $this->hasMany(EventoLocalidad::class);
    }
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }
    public function sectors(){
        return $this->hasMany(Sector::class);
    }
}
