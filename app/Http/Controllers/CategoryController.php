<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\companies;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::with('company')->get();
        $companies = companies::all();
        return view('category.add',compact('categories','companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        return view('category.add', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
  
        Categories::create($validatedData);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
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
        $categories = Categories::findOrFail($id);
        $companies = companies::all();
        return view('category.edit', compact('categories', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $categories = Categories::findOrFail($id);
        $categories->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
