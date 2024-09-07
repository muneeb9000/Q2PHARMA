<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\companies;
use App\Models\User;
use App\Models\Warehouses;
use App\Models\Supplier;
use App\Models\Products;
use App\Models\Purchases;
use App\Models\PurchasesDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $users = User::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouses::all();
        $purchases = Purchases::with('company','user','supplier','warehouses')->get();
        $purchases = Purchases::paginate(10);
        return view('purchases.list',compact('companies','users','suppliers','warehouses','purchases'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = companies::all();
        $users = User::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouses::all();
        $products = Products::all();
        $purchases = Purchases::all();
        return view('purchases.add', compact('companies','users','suppliers','warehouses','products','purchases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'bill_no' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'remarks' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
            'total_discount' => 'nullable|numeric|min:0',
            'purchases.*.product' => 'required|exists:products,id',
            'purchases.*.unit_price' => 'required|numeric|min:0',
            'purchases.*.quantity' => 'required|integer|min:1',
            'purchases.*.discount' => 'nullable|numeric|min:0',
        ]);
        $purchase = Purchases::create([
            'company_id' => $validatedData['company_id'],
            'supplier_id' => $validatedData['supplier_id'],
            'warehouse_id' => $validatedData['warehouse_id'],
            'bill_no' => $validatedData['bill_no'],
            'purchase_date' => $validatedData['purchase_date'],
            'users_id' => Auth::id(),
            'remarks' => $validatedData['remarks'],
            'total_amount' => $validatedData['total_amount'],
            'total_discount' => $validatedData['total_discount'],
        ]);
        foreach ($request['purchases'] as $item) {
            PurchasesDetails::create([
                'purchases_id' => $purchase->id,
                'products_id' => $item['product'],
                'product_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'discounts' => $item['discount'],
            ]);
        }
        return redirect()->route('purchases.index')->with('success', 'Purchase added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchases::with('details.product')->findOrFail($id);
         return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $companies = Companies::all(); 
    $suppliers = Supplier::all(); 
    $warehouses = Warehouses::all(); 
    $products = Products::all(); 
    $purchase = Purchases::with(['details', 'products'])->findOrFail($id);
    
    return view('purchases.edit', compact('purchase', 'companies', 'suppliers', 'warehouses', 'products'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

    $purchase = Purchases::findOrFail($id);

    $purchase->update([
        'company_id' => $request['company_id'],
        'supplier_id' => $request['supplier_id'],
        'warehouse_id' => $request['warehouse_id'],
        'bill_no' => $request['bill_no'],
        'purchase_date' => $request['purchase_date'],
        'users_id' => Auth::id(),
        'remarks' => $request['remarks'],
        'total_amount' => $request['total_amount'],
        'total_discount' => $request['total_discount'],
    ]);
    $purchase->details()->delete();

    // Insert new purchase details
    foreach ($request['purchases'] as $item) {
        PurchasesDetails::create([
            'purchases_id' => $purchase->id,
            'products_id' => $item['product'],
            'product_price' => $item['unit_price'],
            'quantity' => $item['quantity'],
            'discounts' => $item['discount'],
        ]);
    }

    return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $purchase = Purchases::findOrFail($id);
    $purchase->details()->delete(); 
    $purchase->delete(); 

    return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully!');
    }

    public function updateStock(Request $request)
    {
        $validatedData = $request->validate([
            'purchases_id' => 'required|exists:purchases,id',
        ]);
        $purchase = Purchases::find($validatedData['purchases_id']);
        $purchaseDetails = PurchasesDetails::where('purchases_id', $validatedData['purchases_id'])->get();
        foreach ($purchaseDetails as $detail) {
            $product = Products::find($detail->products_id);
            $quantityToAdd = (int) $detail->quantity * (int) $product->unit_ratio;
            $product->current_stock = (int) $product->current_stock + $quantityToAdd;
            $product->save();
        }
        $purchase->purchase_status = 'received';
        $purchase->save();
        return redirect()->route('purchases.index')->with('success', 'Stock updated and purchase marked as received successfully!');
    }
    
   
    public function returnPurchase($id)
    {
        $purchase = Purchases::findOrFail($id);
        $purchase->update(['purchase_status' => 'returned']);
        $purchaseDetails = PurchasesDetails::where('purchases_id', $id)->get();
        foreach ($purchaseDetails as $detail) {
            $product = Products::find($detail->products_id);
            if ($product) {
                $quantityToSubtract = (int) $detail->quantity * (int) $product->unit_ratio;
                $product->current_stock -= $quantityToSubtract;
                $product->save();
            }
        }
        return redirect()->route('purchases.index')->with('success', 'Purchase marked as returned and stock updated.');
    }
    

    public function getSuppliers($companyId)
    {
        $suppliers = Supplier::where('company_id', $companyId)->get();
        return response()->json($suppliers);
    }

    public function getWarehouses($companyId)
    {
        $warehouses = Warehouses::where('company_id', $companyId)->get();
        return response()->json($warehouses);
    }

    public function getPurchases($companyId)
    {
        $purchases = Purchases::where('company_id', $companyId)->get();
        return response()->json($purchases);
    }

    public function purchasepayment(Request $request,$id)
    {
        $purchases = Purchases::findOrFail($id);
        $purchases->payee_name = $request->payee_name;
        $purchases->payment_status = 'paid'; 
        $purchases->update();
        return redirect()->back()->with('success', 'Purchase updated successfully. Payment status is now paid.');
    }

}
