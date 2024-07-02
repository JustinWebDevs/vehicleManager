<?php

namespace App\Http\Controllers;

use App\Models\TiposVehiculos;
use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculos::with('tipoVehiculo')->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposVehiculos = TiposVehiculos::all();

        return view('vehiculos.create', compact('tiposVehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|unique:vehiculos,placa|max:10',
            'tipo_vehiculo_id' => 'required|exists:tipos_vehiculos,id',
            'kilometraje' => 'required|integer',
            'estado' => 'required|boolean',
            'propietario' => 'required|string|max:255',
        ]);

        Vehiculos::create($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
