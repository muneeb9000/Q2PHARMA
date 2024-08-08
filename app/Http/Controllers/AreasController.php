<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Cities;
use App\Models\Companies;
use App\Http\Requests\StoreAreasRequest;
use App\Http\Requests\UpdateAreasRequest;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        return view('routemanage.area', compact('areas', 'cities', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        $cities = []; // Initialize empty array or fetch cities if needed
        return view('areas.create', compact('companies', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAreasRequest $request)
    {
        $validatedData = $request->validate();
        Areas::create($validatedData);
        return redirect()->route('area.index')->with('Success', 'Area Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = Areas::findOrFail($id);
        $companies = Companies::all();
        $cities = Cities::all();
        return view('routemanage.areaedit', compact('area', 'cities', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAreasRequest $request, string $id)
    {
        $validatedData = $request->validate();
        $areas = Areas::findOrFail($id);
        $areas->update($validatedData);
        return redirect()->route('area.index')->with('Success', 'Area Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $areas = Areas::findOrFail($id);
        $areas->delete();
        return redirect()->route('area.index')->with('Success', 'Area Deleted Successfully');
    }
    public function getAreas($cityId)
    {
        $areas = Areas::where('city_id', $cityId)->get();
        return response()->json($areas);
    }

}
