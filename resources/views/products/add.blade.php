@extends('layouts.layout')
<br>
@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Add New Product</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Products', 'url' => route('products.index'), 'icon' => 'ti ti-box'],
                        ['name' => 'Add New Product', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <!-- Page Header Close --> 
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body add-products p-0">
                        <div class="p-4">
                            <form method="POST" action="{{ route('products.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-xl-12">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="company_id" class="form-label">Company</label>
                                        <select class="form-control js-example-basic-single @error('company_id') is-invalid @enderror" name="company_id" id="company_id" required>
                                            <option value="">Select Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-control js-example-basic-single @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required>
                                            <option value="">Select Category</option>
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="code" class="form-label">Product Code</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Product Code" value="{{ old('code') }}" required>
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="barcode" class="form-label">Barcode</label>
                                        <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Barcode" value="{{ old('barcode') }}">
                                        @error('barcode')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="SKU" value="{{ old('sku') }}" required>
                                        @error('sku')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="batch_number" class="form-label">Batch Number</label>
                                        <input type="text" class="form-control @error('batch_number') is-invalid @enderror" id="batch_number" name="batch_number" placeholder="Batch Number" value="{{ old('batch_number') }}">
                                        @error('batch_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="reorder_level" class="form-label">Reorder Level</label>
                                        <input type="number" class="form-control @error('reorder_level') is-invalid @enderror" id="reorder_level" name="reorder_level" placeholder="Reorder Level" value="{{ old('reorder_level') }}" required>
                                        @error('reorder_level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="strength" class="form-label">Strength</label>
                                        <input type="text" class="form-control @error('strength') is-invalid @enderror" id="strength" name="strength" placeholder="Strength" value="{{ old('strength') }}">
                                        @error('strength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="purchase_unit_id" class="form-label">Purchase Unit</label>
                                        <select class="form-control js-example-basic-single @error('purchase_unit_id') is-invalid @enderror" name="purchase_unit_id" id="purchase_unit_id" required>
                                            <option value="">Select Purchase Unit</option>
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                        @error('purchase_unit_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="sale_unit_id" class="form-label">Sale Unit</label>
                                        <select class="form-control js-example-basic-single @error('sale_unit_id') is-invalid @enderror" name="sale_unit_id" id="sale_unit_id" required>
                                            <option value="">Select Sale Unit</option>
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                        @error('sale_unit_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="unit_ratio" class="form-label">Unit Ratio</label>
                                        <input type="number" step="0.01" class="form-control @error('unit_ratio') is-invalid @enderror" id="unit_ratio" name="unit_ratio" placeholder="Unit Ratio" value="{{ old('unit_ratio') }}" required>
                                        @error('unit_ratio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control js-example-basic-single @error('status') is-invalid @enderror" name="status" id="status" required>
                                            <option value="">Select Status</option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="purchase_price" class="form-label">Purchase Price</label>
                                        <input type="number" step="0.01" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" name="purchase_price" placeholder="Purchase Price" value="{{ old('purchase_price') }}" required>
                                        @error('purchase_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <input type="number" step="0.01" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="Sale Price" value="{{ old('sale_price') }}" required>
                                        @error('sale_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                     <div class="col-xl-6">
                                        <label for="tax" class="form-label">Tax</label>
                                        <input type="number" step="0.01" class="form-control @error('tax') is-invalid @enderror" id="tax" name="tax" placeholder="Tax" value="{{ old('tax', $product->tax ?? '') }}" required>
                                        @error('tax')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="availability" class="form-label">Availability</label>
                                        <select class="form-control js-example-basic-single @error('availability') is-invalid @enderror" name="availability" id="availability" required>
                                            <option value="">Select Availability</option>
                                            <option value="in_stock" {{ old('availability', $product->availability ?? '') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                            <option value="out_of_stock" {{ old('availability', $product->availability ?? '') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                        </select>
                                        @error('availability')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Product Description">{{ old('description', $product->description ?? '') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->
    </div>
</div>
<!-- End::app-content -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for dropdowns
    $('.js-example-basic-single').select2();

    function loadCategories(companyId) {
        if (companyId) {
            $.ajax({
                url: `/get-categories/${companyId}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log('Categories Data:', data); // Debugging line
                    var $categorySelect = $('#category_id');
                    $categorySelect.empty().append('<option value="">Select Category</option>');
                    $.each(data, function(key, value) {
                        $categorySelect.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                    $categorySelect.val(null).trigger('change'); // Clear selected value and update Select2
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debugging line
                }
            });
        }
    }

    function loadUnits(companyId) {
        if (companyId) {
            $.ajax({
                url: '/get-units/' + companyId,
                type: 'GET',
                success: function(data) {
                    console.log('Units Data:', data); // Debugging line
                    var $purchaseUnitSelect = $('#purchase_unit_id');
                    var $saleUnitSelect = $('#sale_unit_id');
                    $purchaseUnitSelect.empty().append('<option value="">Select Purchase Unit</option>');
                    $saleUnitSelect.empty().append('<option value="">Select Sale Unit</option>');
                    $.each(data, function(index, unit) {
                        $purchaseUnitSelect.append('<option value="'+ unit.id +'">'+ unit.name +'</option>');
                        $saleUnitSelect.append('<option value="'+ unit.id +'">'+ unit.name +'</option>');
                    });
                    $purchaseUnitSelect.val(null).trigger('change'); // Clear selected value and update Select2
                    $saleUnitSelect.val(null).trigger('change'); // Clear selected value and update Select2
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debugging line
                }
            });
        }
    }

    $('#company_id').change(function() {
        var companyId = $(this).val();
        loadCategories(companyId);
        loadUnits(companyId);
    });

    // Load categories and units based on initial company selection
    var initialCompanyId = $('#company_id').val();
    if (initialCompanyId) {
        loadCategories(initialCompanyId);
        loadUnits(initialCompanyId);
    }
});
</script>
@endsection
