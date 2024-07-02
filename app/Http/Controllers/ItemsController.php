<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'orden_id' => 'required|exists:ordenes,id',
            'descripcion' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'valor' => 'required|integer',
        ]);

        $orden_id = $request->input('orden_id');
        $descripcion = $request->input('descripcion');

        $existingItem = Items::where('orden_id', $orden_id)
                            ->where('descripcion', $descripcion)
                            ->first();

        if ($existingItem) {
            return redirect()->back()->withErrors(['error' => 'El ítem ya se encuentra en la orden de servicio.']);
        }

        Items::create($request->all());

        return redirect()->back()->with('success', 'Item agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $item)
    {
        $item->delete();

        return redirect()->back()->with('success', 'Item eliminado correctamente.');
    }
}
