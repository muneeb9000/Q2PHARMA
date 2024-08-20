@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">EDIT PURCHASE</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchases', 'url' => route('purchases.index'), 'icon' => 'ti ti-shopping-cart'],
                        ['name' => 'Edit Purchase', 'icon' => 'ti ti-edit'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="company_id" class="form-label">Company</label>
                                            <select id="company_id" name="company_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Company...</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $company->id == $purchase->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="supplier_id" class="form-label">Supplier</label>
                                            <select id="supplier_id" name="supplier_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Supplier...</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="warehouse_id" class="form-label">Warehouse</label>
                                            <select id="warehouse_id" name="warehouse_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Warehouse...</option>
                                                @foreach($warehouses as $warehouse)
                                                    <option value="{{ $warehouse->id }}" {{ $warehouse->id == $purchase->warehouse_id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bill_no" class="form-label">Bill Number</label>
                                            <input type="text" class="form-control" id="bill_no" name="bill_no" value="{{ $purchase->bill_no }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="purchase_status" class="form-label">Purchase Status</label>
                                            <select id="purchase_status" name="purchase_status" class="form-control js-example-basic-single">
                                                <option selected>Choose Status...</option>
                                                <option value="1" {{ $purchase->purchase_status == 1 ? 'selected' : '' }}>Pending</option>
                                                <option value="2" {{ $purchase->purchase_status == 2 ? 'selected' : '' }}>Completed</option>
                                                <option value="3" {{ $purchase->purchase_status == 3 ? 'selected' : '' }}>Cancelled</option>
                                                <option value="4" {{ $purchase->purchase_status == 4 ? 'selected' : '' }}>Returned</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="payment_status" class="form-label">Payment Status</label>
                                            <select id="payment_status" name="payment_status" class="form-control js-example-basic-single">
                                                <option selected>Choose Payment Status...</option>
                                                <option value="1" {{ $purchase->payment_status == 1 ? 'selected' : '' }}>Unpaid</option>
                                                <option value="2" {{ $purchase->payment_status == 2 ? 'selected' : '' }}>Partially Paid</option>
                                                <option value="3" {{ $purchase->payment_status == 3 ? 'selected' : '' }}>Paid</option>
                                                <option value="4" {{ $purchase->payment_status == 4 ? 'selected' : '' }}>Overdue</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="purchase_date" class="form-label">Purchase Date</label>
                                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ $purchase->purchase_date }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks">{{ $purchase->remarks }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="purchaseItems" class="col-md-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mt-md" id="tableID">
                                        <thead>
                                            <tr>
                                                <th>Product <span class="required">*</span></th>
                                                <th>Unit Price</th>
                                                <th>Quantity <span class="required">*</span></th>
                                                <th>Discount</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchase->details as $detail)
                                                <tr id="row_{{ $loop->index }}">
                                                    <td class="col-4">
                                                        <div class="form-group">
                                                            <select class="form-control purchase_product js-example-basic-single" name="purchases[{{ $loop->index }}][product]" id="product{{ $loop->index }}">
                                                                <option value="" disabled>Choose Products...</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}" data-price="{{ $product->purchase_price }}" {{ $detail->products_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="col-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control purchase_unit_price" name="purchases[{{ $loop->index }}][unit_price]" readonly value="{{ $detail->product_price }}" />
                                                        </div>
                                                    </td>
                                                    <td class="col-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control purchase_quantity" name="purchases[{{ $loop->index }}][quantity]" id="quantity{{ $loop->index }}" value="{{ $detail->quantity }}" />
                                                        </div>
                                                    </td>
                                                    <td class="col-2">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control purchase_discount" name="purchases[{{ $loop->index }}][discount]" value="{{ $detail->discounts }}" />
                                                        </div>
                                                    </td>
                                                    <td class="col-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control net_sub_total" name="purchases[{{ $loop->index }}][net_sub_total]" readonly />
                                                            <input type="hidden" class="sub_total" name="purchases[{{ $loop->index }}][sub_total]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-wave" onclick="deleteRow({{ $loop->index }})"><i class="fa fa-trash"></i> Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="1">
                                                    <button type="button" class="btn btn-success btn-wave" onclick="addRows()"><i class="fas fa-plus-circle"></i> Add Rows</button>
                                                </td>
                                                <td class="text-right" colspan="3"><b>Total Purchase Amount:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="netGrandTotal" class="text-right form-control" name="total_amount" value="{{ $purchase->total_amount }}" readonly />
                                                    <input type="hidden" id="grandTotal" name="total_amount" value="{{ $purchase->total_amount }}">
                                                    <input type="hidden" id="item_count" value="{{ count($purchase->details) }}">
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-12 text-right mt-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-wave">Save Purchase</button>
                                <a href="{{ route('purchases.index') }}" class="btn btn-dark btn-lg btn-wave">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
// Function to update calculations for a row
function updateRowCalculations($row) {
    var unitPrice = parseFloat($row.find('.purchase_unit_price').val()) || 0;
    var quantity = parseFloat($row.find('.purchase_quantity').val()) || 1;
    var discount = parseFloat($row.find('.purchase_discount').val()) || 0;

    var totalPrice = (unitPrice * quantity) - discount;
    $row.find('.net_sub_total').val(totalPrice.toFixed(2));
    $row.find('.sub_total').val(totalPrice.toFixed(2));

    updateGrandTotal();
}

// Function to update grand total
function updateGrandTotal() {
    var grandTotal = 0;
    $('.sub_total').each(function() {
        grandTotal += parseFloat($(this).val()) || 0;
    });
    $('#netGrandTotal').val(grandTotal.toFixed(2));
    $('#grandTotal').val(grandTotal.toFixed(2));
}

// Function to add a new row
window.addRows = function() {
    var index = $('#tableID tbody tr').length;
    var newRow = `<tr id="row_${index}">
        <td class="col-4">
            <div class="form-group">
                <select class="form-control purchase_product js-example-basic-single" name="purchases[${index}][product]" id="product${index}">
                    <option value="" selected disabled>Choose Products...</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->purchase_price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </td>
        <td class="col-2">
            <div class="form-group">
                <input type="text" class="form-control purchase_unit_price" name="purchases[${index}][unit_price]" readonly value="0.00" />
            </div>
        </td>
        <td class="col-2">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control purchase_quantity" name="purchases[${index}][quantity]" value="1" id="quantity${index}" />
                </div>
            </div>
        </td>
        <td class="col-2">
            <div class="form-group">
                <input type="number" class="form-control purchase_discount" name="purchases[${index}][discount]" value="0" />
            </div>
        </td>
        <td class="col-2">
            <div class="form-group">
                <input type="text" class="form-control net_sub_total" name="purchases[${index}][net_sub_total]" value="0.00" readonly />
                <input type="hidden" class="sub_total" name="purchases[${index}][sub_total]" value="0">
            </div>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-wave" onclick="deleteRow(${index})"><i class="fa fa-trash"></i> Remove</button>
        </td>
    </tr>`;

    $('#tableID tbody').append(newRow);
    $('.js-example-basic-single').select2();

    // Attach event listeners to the new row
    var $newRow = $(`#row_${index}`);
    $newRow.find('.purchase_product').on('change', function() {
        var $row = $(this).closest('tr');
        var unitPrice = parseFloat($(this).find('option:selected').data('price')) || 0;
        console.log('Selected unit price:', unitPrice); // Debugging line
        $row.find('.purchase_unit_price').val(unitPrice.toFixed(2));
        updateRowCalculations($row);
    });
    $newRow.find('.purchase_quantity, .purchase_discount').on('input', function() {
        var $row = $(this).closest('tr');
        updateRowCalculations($row);
    });
}

// Function to delete a row
window.deleteRow = function(rowIndex) {
    $('#row_' + rowIndex).remove();
    updateGrandTotal();
}

// Event listener for existing rows
$(document).ready(function() {
    // Initial calculation for rows that are already present
    $('#tableID tbody tr').each(function() {
        updateRowCalculations($(this));

        // Attach event listeners to existing rows
        var $row = $(this);
        $row.find('.purchase_product').on('change', function() {
            var unitPrice = parseFloat($(this).find('option:selected').data('price')) || 0;
            $row.find('.purchase_unit_price').val(unitPrice.toFixed(2));
            updateRowCalculations($row);
        });
        $row.find('.purchase_quantity, .purchase_discount').on('input', function() {
            updateRowCalculations($row);
        });
    });
});
</script>

@endsection
