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
        return $this->belongsTo(Company::class);
    }
}
