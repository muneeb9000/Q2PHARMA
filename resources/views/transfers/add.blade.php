@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD WAREHOUSE TRANSFER</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Warehouse Transfers', 'url' => route('warehouse.index'), 'icon' => 'ti ti-box'],
                        ['name' => 'Add New Transfer', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('warehouse.store') }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="col-md-12">
                                <label for="company_id" class="form-label">Company</label>
                                <select id="company_id" name="company_id" class="form-control js-example-basic-single">
                                    <option selected>Choose Company...</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="transfer_date" class="form-label">Transfer Date</label>
                                <input type="date" class="form-control" id="transfer_date" name="transfer_date">
                            </div>
                            <div class="col-md-12">
                                <label for="from_warehouse_id" class="form-label">From Warehouse</label>
                                <select id="from_warehouse_id" name="from_warehouse_id" class="form-control js-example-basic-single">
                                    <option selected>Choose From Warehouse...</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="to_warehouse_id" class="form-label">To Warehouse</label>
                                <select id="to_warehouse_id" name="to_warehouse_id" class="form-control js-example-basic-single">
                                    <option selected>Choose To Warehouse...</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="product_id" class="form-label">Product</label>
                                <select id="product_id" name="product_id" class="form-control js-example-basic-single">
                                    <option selected>Choose Product...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                            </div>
                            <div class="col-md-12">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Transfer</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for dropdowns
    $('.js-example-basic-single').select2();
});
</script>
@endsection
