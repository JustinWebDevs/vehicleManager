<?php

namespace App\Http\Controllers;

use App\Models\TiposVehiculos;
use Illuminate\Http\Request;

class TiposVehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposVehiculos = TiposVehiculos::all();

        return view('tiposVehiculos.index', compact('tiposVehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TiposVehiculos $tiposVehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiposVehiculos $tiposVehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiposVehiculos $tiposVehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposVehiculos $tiposVehiculos)
    {
        //
    }
}
