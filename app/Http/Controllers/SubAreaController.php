<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubAreaRequest;
use App\Http\Requests\UpdateSubAreaRequest;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\SubArea;

class SubAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        $subareas = SubArea::all();
        return view('routemanage.subarea', compact('companies', 'cities', 'areas', 'subareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        return view('routemanage.subarea', compact('companies', 'cities', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubAreaRequest $request)
    {
        $request->validate();
        SubArea::create($request->all());
        return redirect()->route('subarea.index')->with('success', 'Sub Area created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subarea = SubArea::findOrFail($id);
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        return view('routemanage.subareaedit', compact('subarea', 'companies', 'cities', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubAreaRequest $request, string $id)
    {
        $request->validate();
        $subarea = SubArea::findOrFail($id);
        $subarea->update($request->all());

        return redirect()->route('subarea.index')->with('success', 'Sub Area updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subarea = SubArea::findOrFail($id);
        $subarea->delete();

        return redirect()->route('subarea.index')->with('success', 'Sub Area deleted successfully.');
    }
    public function getSubAreas($areaId)
    {
        $subAreas = SubArea::where('area_id', $areaId)->get();
        return response()->json($subAreas);
    }
}
