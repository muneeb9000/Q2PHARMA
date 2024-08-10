<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\companies;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $suppliers = Supplier::all();
        return view ('supplier.list',compact('companies','suppliers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all(); 
            return view('supplier.add', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $validatedData = $request->validated();
        Companies::create($validatedData);
        return redirect()->route('supplier.index')->with('Success', 'Supplier created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suppliers = Supplier::findOrFail($id);
        return view ('supplier.show', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = companies::all();
        $suppliers = Supplier::findOrFail($id);
        return view('supplier.edit', compact('suppliers','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $validatedData = $request->validated();
        Supplier::whereId($id)->update($validatedData);
        return redirect()->route('supplier.index')->with('Success','Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        return redirect()->route('supplier.index')->with('Success','Supplier deleted successfully');
    }
}
