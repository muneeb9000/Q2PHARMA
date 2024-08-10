<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Companies;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Units::with('company')->get();
        $companies = Companies::all();
        return view('units.add', compact('units', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        return view('units.add', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
    $validatedData = $request->validated();
    Units::create($validatedData);
    return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Units::with('company')->findOrFail($id);
        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Units::findOrFail($id);
        $companies = Companies::all();
        return view('units.edit', compact('unit', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $unit = Units::findOrFail($id);
        $unit->update($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Units::findOrFail($id);
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
