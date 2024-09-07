<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Accounts;
use App\Models\Products;
use App\Models\companies;
use App\Models\Customers;
use App\Models\Purchases;
use App\Models\Supplier;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $transaction = Accounts::all();
        $transactions = Accounts::paginate(10);
        return view ('accounts.list',compact('companies','transactions'));
    }

    public function salesinvoices()
    {
        $sales = Sales::all();
        $sales = Sales::paginate(10);
        return view('sales.invoices', compact('sales'));
    }

    public function saleprint($id)
    {
        $companies = companies::find($id);
        $customers = Customers::all();
        $products = Products::all();
        $sales = Sales::find($id);
        return view('sales.print', compact('companies','customers','sales','products'));
    }
    public function purchaseinvoices()
    {
        $purchases = Purchases::all();
        $purchases = Purchases::paginate(10);
        return view('purchases.invoices', compact('purchases'));
    }

    public function purchaseprint($id)
    {
        $companies = companies::find($id);
        $suppliers = Supplier::all();
        $products = Products::all();
        $purchases = Purchases::find($id);
        return view('purchases.print', compact('companies','suppliers','purchases','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        $transactions = Accounts::all();
        $transTypes = ['INCOME', 'EXPENSE'];
        $payViaOptions = ['BANK', 'CASH', 'ONLINE', 'CHEQUE'];
        return view('accounts.add', compact('companies', 'transactions', 'transTypes', 'payViaOptions'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $validatedData = $request->validated();
        Accounts::create($validatedData);
        return redirect()->route('accounts.index')->with('success', 'Transaction added successfully.');
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
    public function edit($id)
    {
        $transaction = Accounts::findOrFail($id);
        $companies = companies::all();
        $transTypes = ['INCOME', 'EXPENSE'];
        $payViaOptions = ['BANK', 'CASH', 'ONLINE', 'CHEQUE'];
        return view('accounts.edit', compact('transaction', 'companies', 'transTypes', 'payViaOptions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        $account = Accounts::findOrFail($id);
        $data = $request->validated();
        $account->update($data);
        return redirect()->route('accounts.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Accounts::findOrFail($id);
        $transaction->delete();
        return redirect()->route('accounts.index')->with('success', 'Transaction deleted successfully.');
    }

}
