<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(Request $request)
    {
        $query = Ordenes::with('items');

        if ($request->filled('fecha_desde') && $request->filled('fecha_hasta')) {
            $query->whereBetween('fecha', [$request->fecha_desde, $request->fecha_hasta]);
        }
        
        $ordenes = $query->orderBy('fecha', 'asc')->get();

        return view('reportes.index', compact('ordenes'));
    }
}