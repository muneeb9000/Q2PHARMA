<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use App\Models\Warehouses;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $warehouses= Warehouses::all();
        return view('warehouses.list', compact('companies','warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        return view('warehouses.add', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseRequest $request)
    {
        $validatedData = $request->validated();
        Warehouses::create($validatedData);
        return redirect()->route('warehouse.index')->with('Success','Warehouse is Successfully Created');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = companies::all();
        $warehouses = Warehouses::findOrFail($id);
        return view('warehouses.edit', compact('companies','warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseRequest $request, string $id)
    {
        $validatedData = $request->validated();
        Warehouses::whereId($id)->update($validatedData);
        return redirect()->route('warehouse.index')->with('Success', 'Warehouse is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouses = Warehouses::findOrFail($id);
        $warehouses->delete();
        return redirect()->route('warehouse.index')->with('Success','Warehouse is deleted successfully');
        
    }
}
