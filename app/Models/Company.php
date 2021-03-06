<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'aerolineas';

    protected $fillable = [
        'nombre', 'descripcion','city_id', 'disponibilidad'
    ];

     public function city()
    {
        return $this->belongsToMany(City::class);

    }
    
    public function vuelo()
    {
        return $this->belongsToMany(Vuelo::class);
    }
    

}
