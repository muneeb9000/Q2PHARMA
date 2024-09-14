<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Units;
use App\Models\companies;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $categories = Categories::all();
        $units = Units::all();
        $products = Products::with('companies', 'categories', 'purchaseUnit','saleUnit')->get();
        $products = Products::paginate(10);
        return view('products.list', compact('products', 'companies', 'categories', 'units'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        $categories = Categories::all();
        $units = Units::all();
        return view('products.add', compact('companies','categories','units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        
        $validatedData = $request->validated();
        Products::create($validatedData);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $companies = companies::all();
        $categories = Categories::all();
        $units = Units::all();
        $product = Products::findOrFail($id);
        return view('products.show', compact('product','companies','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = companies::all();
        $categories = Categories::all();
        $units = Units::all();
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product','companies','categories','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $product = Products::findOrFail($id);
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function getCategories($companyId)
    {
        $categories = Categories::where('company_id', $companyId)->get();
        return response()->json($categories);
    }
    public function getUnits($companyId)
    {
        $units = Units::where('company_id', $companyId)->get();
        return response()->json($units);
    }

    public function import()
    {

        dd('working');
        return view('products.upload');

    }

    public function productsapi()
    {
        $products = Products::with('companies')->get();
        return ProductResource::collection($products);
    }

}
