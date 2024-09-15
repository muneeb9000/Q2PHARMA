<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\companies;
use App\Models\Sales;
use App\Models\User;
use App\Models\Products;
use App\Models\SalesDetails;
use Illuminate\Http\Request;
use App\Http\Resources\SaleResource;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $customers = Customers::all();
        $sales = Sales::with('company','user','customers')->get();
        $sales = Sales::paginate(10);
        $users = User::all();
        return view('sales.list',compact('companies','customers','sales','users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        $users = User::all();
        $customers = Customers::all();
        $products = Products::all();
        $sales = Sales::all();
        return view('sales.add',compact('companies','users','customers','products','sales'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
    $sales = Sales::create([
        'company_id' => $request['company_id'],
        'customer_id' => $request['customer_id'],
        'invoice_no' => $request['invoice_no'],
        'sale_date' => $request['sale_date'],
        'users_id' => Auth::id(),
        'remarks' => $request['remarks'],
        'total_amount' => $request['total_amount'],
        'total_discount' => $request['total_discount'],
    ]);
    foreach ($request['sales'] as $item) {
        SalesDetails::create([
            'sales_id' => $sales->id,
            'product_id' => $item['product'],
            'product_price' => $item['unit_price'],
            'quantity' => $item['quantity'],
            'discounts' => $item['discount'],
        ]);
    }
    return redirect()->route('sales.index')->with('success', 'Sales added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sales::with('company', 'user', 'customers', 'salesDetails.product')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }
   /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = Sales::findOrFail($id);
        $companies = companies::all();
        $users = User::all();
        $customers = Customers::all();
        $products = Products::all();

        return view('sales.edit', compact('sales', 'companies', 'users', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sales = Sales::findOrFail($id);
        $sales->update([
            'company_id' => $request['company_id'],
            'customer_id' => $request['customer_id'],
            'invoice_no' => $request['invoice_no'],
            'sale_date' => $request['sale_date'],
            'users_id' => Auth::id(),
            'remarks' => $request['remarks'],
            'total_amount' => $request['total_amount'],
            'total_discount' => $request['total_discount'],
        ]);
        $sales->details()->delete();
        foreach ($request['sales'] as $item) {
            SalesDetails::create([
                'sales_id' => $sales->id,
                'product_id' => $item['product'],
                'product_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'discounts' => $item['discount'],
            ]);
        }
        return redirect()->route('sales.index')->with('success', 'Purchase updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sales::findOrFail($id);
        SalesDetails::where('sales_id', $id)->delete();
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sales deleted successfully!');
    }

    public function getCustomers($companyId)
    {
        $customers = Customers::where('company_id', $companyId)->get();
        return response()->json($customers);
    }

    public function salepayment(Request $request, $id)
    {
        
        $sale = Sales::findOrFail($id);
        $sale->payee_name = $request->payee_name;
        $sale->payment_status = 'paid'; 
        $sale->update();
        return redirect()->back()->with('success', 'Sale updated successfully. Payment status is now paid.');
    }

    public function storeSaleAPI(Request $request)
    {
        // Store Sale with default company_id = 1, users_id = 1, total_discount = 0 if not provided
        $sales = Sales::create([
            'company_id' => $request['company_id'] ?? 1,
            'customer_id' => $request['customer_id'],
            'invoice_no' => $request['invoice_no'],
            'sale_date' => $request['sale_date'],
            'users_id' => $request['users_id'] ?? 1,
            'remarks' => $request['remarks'],
            'total_amount' => $request['total_amount'],
            'total_discount' => $request['total_discount'] ?? 0,  // Default discount as 0
        ]);

        // Store Sale Details
        foreach ($request['sales'] as $item) {
            SalesDetails::create([
                'sales_id' => $sales->id,
                'product_id' => $item['product'],
                'product_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'discounts' => $item['discount'] ?? 0, // Default discount as 0 in sale details
            ]);
        }

        // Return the newly created sale as a response using SaleResource
        return new SaleResource($sales);
    }

    public function salepaymentapi(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'payee_name' => 'required|string|max:255',
        ]);

        // Find the sale by ID or return a 404 error if not found
        $sale = Sales::findOrFail($id);

        // Update the payment details
        $sale->payee_name = $request->payee_name;
        $sale->payment_status = 'paid'; 
        $sale->update();

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Sale payment updated successfully.',
            'sale_id' => $sale->id,
            'invoice_no' => $sale->invoice_no,
            'payment_status' => $sale->payment_status
        ], 200);
    }
}
