<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'orden_id', 'descripcion', 'cantidad', 'valor'
    ];

    public function orden()
    {
        return $this->belongsTo(Ordenes::class, 'orden_id');
    }
}
