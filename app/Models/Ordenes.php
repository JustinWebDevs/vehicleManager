<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculos;
use App\Models\Items;

class Ordenes extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'vehiculo_id',
        'tipo_orden',
        'fecha'
    ];

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }

    public function items()
    {
        return $this->hasMany(Items::class, 'orden_id');
    }
}
