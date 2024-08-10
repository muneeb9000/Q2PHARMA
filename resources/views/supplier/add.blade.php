@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD SUPPLIER</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Supplier', 'url' => route('supplier.index'), 'icon' => 'ti ti-user'],
                        ['name' => 'Add New Supplier', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('supplier.store') }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="col-md-12">
                                <label for="company_id" class="form-label">Company</label>
                                <select id="company_id" name="company_id" class="form-select form-select-lg">
                                    <option selected>Choose Company...</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="sup_company" class="form-label">Supplier Company</label>
                                <input type="text" class="form-control" id="sup_company" name="sup_company" placeholder="Supplier Company Name">
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Supplier Address">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Supplier</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
