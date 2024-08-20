@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">EDIT SUPPLIER</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Supplier', 'url' => route('supplier.index'), 'icon' => 'ti ti-user'],
                        ['name' => 'Edit Supplier', 'url' => route('supplier.edit', $suppliers->id), 'icon' => 'ti ti-edit'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
       <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.update', $suppliers->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="company_id" class="form-label">Company</label>
                                <select class="form-control js-example-basic-single" id="company_id" name="company_id" required>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ $suppliers->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sup_company" class="form-label">Supplier Company</label>
                                <input type="text" class="form-control" id="sup_company" name="sup_company" value="{{ old('sup_company', $suppliers->sup_company) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $suppliers->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $suppliers->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $suppliers->phone) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $suppliers->address) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Supplier</button>
                                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for dropdowns
    $('.js-example-basic-single').select2();
});
</script>