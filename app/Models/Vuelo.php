<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';

    protected $fillable = [
        'name_aerolinea_id', 'hora_despegue', 'hora_llegada', 'ciudad_llegada', 'ciudad_destino'
    ];

    public function company()
    {
        return $this->belongsToMany(Company::class);
    }

    public function city()
    {
        return $this->belongsToMany(City::class);
    }

    public function city_company()
    {
        return $this->hasMany(CityCompany::class);
    }
}

