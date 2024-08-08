<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Companies;
use App\Http\Requests\StoreCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::with('company')->get();
        $companies = Companies::all();
        return view('routemanage.city', compact('cities', 'companies'));
    }

    public function create()
    {
        $companies = Companies::all();
        return view('routemanage.city', compact('companies'));
    }

    public function store(StoreCitiesRequest $request)
    {
        $validatedData = $request->validated();
        Cities::create($validatedData);
        return redirect()->route('city.index')->with('success', 'City Created Successfully');
    }

    public function edit($id)
    {
        $city = Cities::findOrFail($id);
        $companies = Companies::all();
        return view('routemanage.cityedit', compact('city', 'companies'));
    }

    public function update(UpdateCitiesRequest $request, $id)
    {
        $validatedData = $request->validated();
        $city = Cities::findOrFail($id);
        $city->update($validatedData);
        return redirect()->route('city.index')->with('success', 'City Updated Successfully');
    }

    public function destroy($id)
    {
        $city = Cities::findOrFail($id);
        $city->delete();
        return redirect()->route('city.index')->with('success', 'City Deleted Successfully');
    }
    public function getCities($companyId)
    {
        $cities = Cities::where('company_id', $companyId)->get();
        return response()->json($cities);
    }
}
