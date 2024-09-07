<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\companies;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\SubArea;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Http\Resources\CustomerResource;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        $sub_areas = SubArea::all();
        $customers = Customers::all();
        return view('customers.list', compact('customers','companies','cities','areas','sub_areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        $sub_areas = SubArea::all();
        return view('customers.add', compact('companies','cities','areas','sub_areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request)
    {
        $validatedData = $request->validated();
        Customers::create($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        $companies = Companies::all();
        $cities = Cities::all();
        $areas = Areas::all();
        $sub_areas = SubArea::all();
        return view('customers.edit', compact('customer','companies','cities','areas','sub_areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, $id)
    {
        $validatedData = $request->validated();
        Customers::whereId($id)->update($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function apiIndex()
    {
        $customers = Customers::with(['company', 'city', 'area', 'sub_area'])->get();
        return CustomerResource::collection($customers);
    }

}
