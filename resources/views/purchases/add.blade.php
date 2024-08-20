@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD PURCHASE</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchases', 'url' => route('purchases.index'), 'icon' => 'ti ti-shopping-cart'],
                        ['name' => 'Add New Purchase', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('purchases.store') }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="company_id" class="form-label">Company</label>
                                            <select id="company_id" name="company_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Company...</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="supplier_id" class="form-label">Supplier</label>
                                            <select id="supplier_id" name="supplier_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Supplier...</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="warehouse_id" class="form-label">Warehouse</label>
                                            <select id="warehouse_id" name="warehouse_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Warehouse...</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bill_no" class="form-label">Bill Number</label>
                                            <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Bill Number">
                                        </div>

                                        <div class="mb-3">
                                            <label for="purchase_status" class="form-label">Purchase Status</label>
                                            <select id="purchase_status" name="purchase_status" class="form-control js-example-basic-single">
                                                <option selected>Choose Status...</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Completed</option>
                                                <option value="3">Cancelled</option>
                                                <option value="4">Returned</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="payment_status" class="form-label">Payment Status</label>
                                            <select id="payment_status" name="payment_status" class="form-control js-example-basic-single">
                                                <option selected>Choose Payment Status...</option>
                                                <option value="1">Unpaid</option>
                                                <option value="2">Partially Paid</option>
                                                <option value="3">Paid</option>
                                                <option value="4">Overdue</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="purchase_date" class="form-label">Purchase Date</label>
                                            <input type="date" class="form-control" id="purchase_date" name="purchase_date">
                                        </div>

                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
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
                                            <tr id="row_0">
                                                <td class="col-4">
                                                    <div class="form-group">
                                                        <select class="form-control purchase_product js-example-basic-single" name="purchases[0][product]" id="product0">
                                                            <option value="" selected disabled>Choose Products...</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}" data-price="{{ $product->purchase_price }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control purchase_unit_price" name="purchases[0][unit_price]" readonly value="0.00" />
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control purchase_quantity" name="purchases[0][quantity]" value="1" id="quantity0" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control purchase_discount" name="purchases[0][discount]" value="0" />
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control net_sub_total" name="purchases[0][net_sub_total]" value="0.00" readonly />
                                                        <input type="hidden" class="sub_total" name="purchases[0][sub_total]" value="0">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-wave" onclick="deleteRow(0)"><i class="fa fa-trash"></i> Remove</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="1">
                                                    <button type="button" class="btn btn-success btn-wave" onclick="addRows()"><i class="fas fa-plus-circle"></i> Add Rows</button>
                                                </td>
                                                <td class="text-right" colspan="3"><b>Total Purchase Amount:</b></td>
                                               <td class="text-right">
                                                    <input type="text" id="netGrandTotal" class="text-right form-control" name="total_amount" value="0.00" readonly />
                                                    <input type="hidden" id="grandTotal" name="total_amount" value="0">
                                                    <input type="hidden" id="totalDiscount" name="total_discount" value="0">
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Add Purchase</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for dropdowns
    $('.js-example-basic-single').select2();

    function loadSuppliers(companyId) {
        if (companyId) {
            $.ajax({
                url: `/get-suppliers/${companyId}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log('Suppliers Data:', data); // Debugging line
                    var $suppliersSelect = $('#supplier_id');
                    $suppliersSelect.empty().append('<option value="">Select Supplier</option>');
                    $.each(data, function(key, value) {
                        $suppliersSelect.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                    $suppliersSelect.val(null).trigger('change'); // Clear selected value and update Select2
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debugging line
                }
            });
        }
    }

    function loadWarehouses(companyId) {
        if (companyId) {
            $.ajax({
                url: `/get-warehouses/${companyId}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log('Warehouses Data:', data); // Debugging line
                    var $warehousesSelect = $('#warehouse_id');
                    $warehousesSelect.empty().append('<option value="">Select Warehouses</option>');
                    $.each(data, function(key, value) {
                        $warehousesSelect.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                    $warehousesSelect.val(null).trigger('change'); // Clear selected value and update Select2
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debugging line
                }
            });
        }
    }

    $('#company_id').change(function() {
        var companyId = $(this).val();
        loadSuppliers(companyId);
        loadWarehouses(companyId);
    });

    // Load categories and units based on initial company selection
    var initialCompanyId = $('#company_id').val();
    if (initialCompanyId) {
        loadSuppliers(initialCompanyId);
        loadWarehouses(initialCompanyId);
    }

    // Function to update calculations for a row
    function updateRowCalculations(row) {
        var unitPrice = parseFloat($(row).find('.purchase_unit_price').val()) || 0;
        var quantity = parseFloat($(row).find('.purchase_quantity').val()) || 1;
        var discount = parseFloat($(row).find('.purchase_discount').val()) || 0;

        var totalPrice = (unitPrice * quantity) - discount;
        $(row).find('.net_sub_total').val(totalPrice.toFixed(2));
        $(row).find('.sub_total').val(totalPrice.toFixed(2));

        updateGrandTotal();
    }

    // Function to update grand total
    function updateGrandTotal() {
        var grandTotal = 0;
        $('.net_sub_total').each(function() {
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
    }

    // Function to delete a row
    window.deleteRow = function(rowIndex) {
        $('#row_' + rowIndex).remove();
        updateGrandTotal();
    }

    // Event listener for product selection change
    $(document).on('change', '.purchase_product', function() {
        var $row = $(this).closest('tr');
        var unitPrice = parseFloat($(this).find('option:selected').data('price')) || 0;
        console.log('Selected unit price:', unitPrice); // Debugging line
        $row.find('.purchase_unit_price').val(unitPrice.toFixed(2));
        updateRowCalculations($row);
    });

        // Event listener for quantity and discount input changes
    $(document).on('input', '.purchase_quantity, .purchase_discount', function() {
        var $row = $(this).closest('tr');
        updateRowCalculations($row);
    });

    // Initial calculation for rows that are already present
    $('#tableID tbody tr').each(function() {
        updateRowCalculations($(this));
    });

});
</script>
@endsection
