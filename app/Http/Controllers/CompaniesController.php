<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Companies::all();
        return view('companies.list', compact('companies'));
    }

    public function create()
    {
        return view('companies.add');
    }

    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();
        Companies::create($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show(string $id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.profile', compact('company'));
    }

    public function edit(string $id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Companies::findOrFail($id);
        $validatedData = $request->validated();
        $company->update($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(string $id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}

