<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación de 1 a muchos inversa
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
}
