@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD WAREHOUSE</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Warehouse', 'url' => route('warehouse.index'), 'icon' => 'ti ti-box'],
                        ['name' => 'Add New Warehouse', 'icon' => 'ti ti-plus'],
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Warehouse Name">
                            </div>
                            <div class="col-md-12">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Warehouse Code">
                            </div>
                            <div class="col-md-12">
                                <label for="mobile_no" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number">
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Warehouse Address">
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Warehouse Description">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Warehouse</button>
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
