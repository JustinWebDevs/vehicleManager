<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Vehiculos;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = Ordenes::with('vehiculos')->get();

        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculos = Vehiculos::all();
        return view('ordenes.create', compact('vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'tipo_orden' => 'required|string|max:255',
            'fecha' => 'required|date',
        ]);

         // Verificar si el vehículo está activo
        $vehiculo = Vehiculos::find($validated['vehiculo_id']);

        if (!$vehiculo->estado) {
            return redirect()->back()->withErrors(['vehiculo_id' => 'El vehículo no está activo.'])->withInput();
        }

        Ordenes::create($validated);

        return redirect()->route('ordenes.index')->with('success', 'Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orden = Ordenes::with('vehiculos')->findOrFail($id);
        return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orden = Ordenes::findOrFail($id);
        $vehiculos = Vehiculos::all();
        return view('ordenes.edit', compact('orden', 'vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'tipo_orden' => 'required|string|max:255',
            'fecha' => 'required|date',
        ]);

         // Verificar si el vehículo está activo
         $vehiculo = Vehiculos::find($validated['vehiculo_id']);

         if (!$vehiculo->estado) {
             return redirect()->back()->withErrors(['vehiculo_id' => 'El vehículo no está activo.'])->withInput();
         }

        $orden = Ordenes::findOrFail($id);
        $orden->update($validated);

        return redirect()->route('ordenes.index')->with('success', 'Orden actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenes $ordenes)
    {
        //
    }
}
