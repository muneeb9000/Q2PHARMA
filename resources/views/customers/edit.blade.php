@extends('layouts.layout')

@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">EDIT CUSTOMER</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Customers', 'url' => route('customers.index'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Edit Customer', 'icon' => 'ti ti-building'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <!-- Page Header Close -->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Start::row-1 -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body add-products p-4">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select class="form-control js-example-basic-single @error('company_id') is-invalid @enderror" id="company_id" name="company_id" required>
                                        <option value="">Select a Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $customer->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="city_id" class="form-label">City</label>
                                    <select class="form-control js-example-basic-single @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                                        <option value="">Select a City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $customer->city_id == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="area_id" class="form-label">Area</label>
                                    <select class="form-control js-example-basic-single @error('area_id') is-invalid @enderror" id="area_id" name="area_id" required>
                                        <option value="">Select an Area</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ $customer->area_id == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="sub_areas_id" class="form-label">Sub Area</label>
                                    <select class="form-control js-example-basic-single @error('sub_areas_id') is-invalid @enderror" id="sub_areas_id" name="sub_areas_id" required>
                                        <option value="">Select a Sub Area</option>
                                        @foreach($sub_areas as $subArea)
                                            <option value="{{ $subArea->id }}" {{ $customer->sub_areas_id == $subArea->id ? 'selected' : '' }}>{{ $subArea->sub_area_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_areas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="customer_type" class="form-label">Customer Type</label>
                                    <input type="text" class="form-control @error('customer_type') is-invalid @enderror" id="customer_type" name="customer_type" value="{{ $customer->customer_type }}" required>
                                    @error('customer_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="business_name" class="form-label">Business Name</label>
                                    <input type="text" class="form-control @error('business_name') is-invalid @enderror" id="business_name" name="business_name" value="{{ $customer->business_name }}" required>
                                    @error('business_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="contact_person_name" class="form-label">Contact Person Name</label>
                                    <input type="text" class="form-control @error('contact_person_name') is-invalid @enderror" id="contact_person_name" name="contact_person_name" value="{{ $customer->contact_person_name }}" required>
                                    @error('contact_person_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="customer_cnic" class="form-label">Customer CNIC</label>
                                    <input type="text" class="form-control @error('customer_cnic') is-invalid @enderror" id="customer_cnic" name="customer_cnic" value="{{ $customer->customer_cnic }}" required>
                                    @error('customer_cnic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="contact_no" class="form-label">Contact No</label>
                                    <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" name="contact_no" value="{{ $customer->contact_no }}" required>
                                    @error('contact_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $customer->address }}" required>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="customer_email" class="form-label">Customer Email</label>
                                    <input type="email" class="form-control @error('customer_email') is-invalid @enderror" id="customer_email" name="customer_email" value="{{ $customer->customer_email }}" required>
                                    @error('customer_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="license_no" class="form-label">License No</label>
                                    <input type="text" class="form-control @error('license_no') is-invalid @enderror" id="license_no" name="license_no" value="{{ $customer->license_no }}">
                                    @error('license_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="license_expiry_date" class="form-label">License Expiry Date</label>
                                    <input type="date" class="form-control @error('license_expiry_date') is-invalid @enderror" id="license_expiry_date" name="license_expiry_date" value="{{ old('license_expiry_date', $customer->license_expiry_date) }}">
                                    @error('license_expiry_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="license_category" class="form-label">License Category</label>
                                    <input type="text" class="form-control @error('license_category') is-invalid @enderror" id="license_category" name="license_category" value="{{ old('license_category', $customer->license_category) }}">
                                    @error('license_category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="tax_filer" class="form-label">Tax Filer</label>
                                    <input type="text" class="form-control @error('tax_filer') is-invalid @enderror" id="tax_filer" name="tax_filer" value="{{ old('tax_filer', $customer->tax_filer) }}" required>
                                    @error('tax_filer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="filer_type" class="form-label">Filer Type</label>
                                    <input type="text" class="form-control @error('filer_type') is-invalid @enderror" id="filer_type" name="filer_type" value="{{ old('filer_type', $customer->filer_type) }}">
                                    @error('filer_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="sales_tax_no" class="form-label">Sales Tax No</label>
                                    <input type="text" class="form-control @error('sales_tax_no') is-invalid @enderror" id="sales_tax_no" name="sales_tax_no" value="{{ old('sales_tax_no', $customer->sales_tax_no) }}">
                                    @error('sales_tax_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="ntn_no" class="form-label">NTN No</label>
                                    <input type="text" class="form-control @error('ntn_no') is-invalid @enderror" id="ntn_no" name="ntn_no" value="{{ old('ntn_no', $customer->ntn_no) }}">
                                    @error('ntn_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="Active" {{ $customer->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $customer->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->
    </div>
</div>
<!-- End::app-content -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Fetch cities when a company is selected
        $('#company_id').change(function() {
            var companyId = $(this).val();
            if (companyId) {
                $.ajax({
                    url: '/get-cities/' + companyId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#city_id').empty().append('<option value="">Select a City</option>');
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#area_id').empty().append('<option value="">Select an Area</option>');
                        $('#sub_areas_id').empty().append('<option value="">Select a Sub Area</option>');
                    }
                });
            }
        });

        // Fetch areas when a city is selected
        $('#city_id').change(function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/get-areas/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#area_id').empty().append('<option value="">Select an Area</option>');
                        $.each(data, function(key, value) {
                            $('#area_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#sub_areas_id').empty().append('<option value="">Select a Sub Area</option>');
                    }
                });
            }
        });

        // Fetch sub-areas when an area is selected
        $('#area_id').change(function() {
            var areaId = $(this).val();
            if (areaId) {
                $.ajax({
                    url: '/get-sub-areas/' + areaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sub_areas_id').empty().append('<option value="">Select a Sub Area</option>');
                        $.each(data, function(key, value) {
                            $('#sub_areas_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        });

        // Initialize select2
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
