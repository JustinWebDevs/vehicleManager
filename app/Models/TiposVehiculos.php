<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculos;

class TiposVehiculos extends Model
{
    use HasFactory;

    protected $table = 'tipos_vehiculos';

    public function vehiculos()
    {
        return $this->hasMany(Vehiculos::class, 'tipo_vehiculo_id');
    }
}
