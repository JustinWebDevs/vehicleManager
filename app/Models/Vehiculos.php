<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TiposVehiculos;
use App\Models\Ordenes;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'placa',
        'tipo_vehiculo_id',
        'kilometraje',
        'estado',
        'propietario'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function tipoVehiculo()
    {
        return $this->belongsTo(TiposVehiculos::class, 'tipo_vehiculo_id');
    }

    public function ordenes()
    {
        return $this->hasMany(Ordenes::class, 'vehiculo_id');
    }

}
