@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD SALES</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Sales', 'url' => route('sales.index'), 'icon' => 'ti ti-shopping-cart'],
                        ['name' => 'Add New Sale', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('sales.store') }}" method="POST" class="row g-3 mt-0">
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
                                            <label for="customer_id" class="form-label">Customer</label>
                                            <select id="customer_id" name="customer_id" class="form-control js-example-basic-single">
                                                <option value="" selected disabled>Choose Customer...</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="invoice_no" class="form-label">Invoice Number</label>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Invoice Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sale_date" class="form-label">Sale Date</label>
                                            <input type="date" class="form-control" id="sale_date" name="sale_date">
                                        </div>

                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="salesItems" class="col-md-12 mt-4">
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
                                                        <select class="form-control sale_product js-example-basic-single" name="sales[0][product]" id="product0">
                                                            <option value="" selected disabled>Choose Products...</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sale_unit_price" name="sales[0][unit_price]" readonly value="0.00" />
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control sale_quantity" name="sales[0][quantity]" value="1" id="quantity0" />
                                                        </div>
                                                        <!-- Display stock number here -->
                                                       <small class="form-text" style="font-size: 11px;">Stock: <span id="stock0" style="font-weight: bold;">50</span></small>
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control sale_discount" name="sales[0][discount]" value="0" />
                                                    </div>
                                                </td>
                                                <td class="col-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control net_sub_total" name="sales[0][net_sub_total]" value="0.00" readonly />
                                                        <input type="hidden" class="sub_total" name="sales[0][sub_total]" value="0">
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
                                                <td class="text-right" colspan="3"><b>Total Sales Amount:</b></td>
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
                                <button type="submit" class="btn btn-primary">Add Sale</button>
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

    function loadCustomers(companyId) {
        if (companyId) {
            $.ajax({
                url: `/get-customers/${companyId}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log('Customers Data:', data); // Debugging line
                    var $customerSelect = $('#customer_id');
                    $customerSelect.empty().append('<option value="">Select Customers</option>');
                    $.each(data, function(key, value) {
                        $customerSelect.append('<option value="'+ value.id +'">'+ value.business_name +'</option>');
                    });
                    $customerSelect.val(null).trigger('change'); // Clear selected value and update Select2
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debugging line
                }
            });
        }
    }

    $('#company_id').change(function() {
        var companyId = $(this).val();
        loadCustomers(companyId);
    });

    // Load categories and units based on initial company selection
    var initialCompanyId = $('#company_id').val();
    if (initialCompanyId) {
        loadCustomers(initialCompanyId);
    }

    // Function to update calculations for a row
    function updateRowCalculations(row) {
        var unitPrice = parseFloat($(row).find('.sale_unit_price').val()) || 0;
        var quantity = parseFloat($(row).find('.sale_quantity').val()) || 1;
        var discount = parseFloat($(row).find('.sale_discount').val()) || 0;

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
                    <select class="form-control sale_product js-example-basic-single" name="sales[${index}][product]" id="product${index}">
                        <option value="" selected disabled>Choose Products...</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td class="col-2">
                <div class="form-group">
                    <input type="text" class="form-control sale_unit_price" name="sales[${index}][unit_price]" readonly value="0.00" />
                </div>
            </td>
            <td class="col-2">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control sale_quantity" name="sales[${index}][quantity]" value="1" id="quantity${index}" />
                    </div>
                </div>
            </td>
            <td class="col-2">
                <div class="form-group">
                    <input type="number" class="form-control sale_discount" name="sales[${index}][discount]" value="0" />
                </div>
            </td>
            <td class="col-2">
                <div class="form-group">
                    <input type="text" class="form-control net_sub_total" name="sales[${index}][net_sub_total]" value="0.00" readonly />
                    <input type="hidden" class="sub_total" name="sales[${index}][sub_total]" value="0">
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
    $(document).on('change', '.sale_product', function() {
        var $row = $(this).closest('tr');
        var unitPrice = parseFloat($(this).find('option:selected').data('price')) || 0;
        console.log('Selected unit price:', unitPrice); // Debugging line
        $row.find('.sale_unit_price').val(unitPrice.toFixed(2));
        updateRowCalculations($row);
    });

        // Event listener for quantity and discount input changes
    $(document).on('input', '.sale_quantity, .sale_discount', function() {
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
