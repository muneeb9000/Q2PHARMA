@extends('layouts.layout')

@section('content')
<!-- Start::app-content -->

<div class="main-content app-content">
    <div class="container-fluid">
      <!-- Success Alert -->
        @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
        </div>
        @endif
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">EDIT COMPANY</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">COMPANY</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EDIT COMPANY</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body add-products p-4">
                        <form method="POST" action="{{ route('companies.update', $company->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="company-name" class="form-label">Company Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company-name" name="company_name" placeholder="Company Name" value="{{ old('company_name', $company->company_name) }}" required>
                                    @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-type" class="form-label">Company Type</label>
                                    <input type="text" class="form-control @error('company_type') is-invalid @enderror" id="company-type" name="company_type" placeholder="Company Type" value="{{ old('company_type', $company->company_type) }}">
                                    @error('company_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('company_email') is-invalid @enderror" id="company-email" name="company_email" placeholder="Email" value="{{ old('company_email', $company->company_email) }}" required>
                                    @error('company_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-number" class="form-label">Mobile No</label>
                                    <input type="tel" class="form-control @error('company_number') is-invalid @enderror" id="company-number" name="company_number" placeholder="Mobile No" value="{{ old('company_number', $company->company_number) }}" required>
                                    @error('company_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('company_city') is-invalid @enderror" id="company-city" name="company_city" placeholder="City" value="{{ old('company_city', $company->company_city) }}" required>
                                    @error('company_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('company_state') is-invalid @enderror" id="company-state" name="company_state" placeholder="State" value="{{ old('company_state', $company->company_state) }}">
                                    @error('company_state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('company_address') is-invalid @enderror" id="company-address" name="company_address" placeholder="Address" value="{{ old('company_address', $company->company_address) }}" required>
                                    @error('company_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-no" class="form-label">License No</label>
                                    <input type="text" class="form-control @error('license_no') is-invalid @enderror" id="license-no" name="license_no" placeholder="License No" value="{{ old('license_no', $company->license_no) }}" required>
                                    @error('license_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ntn-no" class="form-label">NTN No</label>
                                    <input type="text" class="form-control @error('ntn_no') is-invalid @enderror" id="ntn-no" name="ntn_no" placeholder="NTN No" value="{{ old('ntn_no', $company->ntn_no) }}" required>
                                    @error('ntn_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gst-no" class="form-label">GST No</label>
                                    <input type="text" class="form-control @error('gst_no') is-invalid @enderror" id="gst-no" name="gst_no" placeholder="GST No" value="{{ old('gst_no', $company->gst_no) }}" required>
                                    @error('gst_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-issuance-date" class="form-label">License Issuance Date</label>
                                    <input type="date" class="form-control @error('license_issue_date') is-invalid @enderror" id="license-issuance-date" name="license_issue_date" placeholder="License Issuance Date" value="{{ old('license_issue_date', $company->license_issue_date) }}" required>
                                    @error('license_issue_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-expiry-date" class="form-label">License Expiry Date</label>
                                    <input type="date" class="form-control @error('license_expiry_date') is-invalid @enderror" id="license-expiry-date" name="license_expiry_date" placeholder="License Expiry Date" value="{{ old('license_expiry_date', $company->license_expiry_date) }}" required>
                                    @error('license_expiry_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-name" class="form-label">CEO/Representative Name</label>
                                    <input type="text" class="form-control @error('ceo_name') is-invalid @enderror" id="ceo-name" name="ceo_name" placeholder="CEO/Representative Name" value="{{ old('ceo_name', $company->ceo_name) }}" required>
                                    @error('ceo_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-number" class="form-label">Person Phone</label>
                                    <input type="tel" class="form-control @error('ceo_number') is-invalid @enderror" id="ceo-number" name="ceo_number" placeholder="Person Phone" value="{{ old('ceo_number', $company->ceo_number) }}" required>
                                    @error('ceo_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-email" class="form-label">Person Email</label>
                                    <input type="email" class="form-control @error('ceo_email') is-invalid @enderror" id="ceo-email" name="ceo_email" placeholder="Person Email" value="{{ old('ceo_email', $company->ceo_email) }}" required>
                                    @error('ceo_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-city" class="form-label">Person City</label>
                                    <input type="text" class="form-control @error('ceo_city') is-invalid @enderror" id="ceo-city" name="ceo_city" placeholder="Person City" value="{{ old('ceo_city', $company->ceo_city) }}" required>
                                    @error('ceo_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-address" class="form-label">Person Address</label>
                                    <input type="text" class="form-control @error('ceo_address') is-invalid @enderror" id="ceo-address" name="ceo_address" placeholder="Person Address" value="{{ old('ceo_address', $company->ceo_address) }}" required>
                                    @error('ceo_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-id-card" class="form-label">Person ID Card</label>
                                    <input type="text" class="form-control @error('ceo_id_card') is-invalid @enderror" id="ceo-id-card" name="ceo_id_card" placeholder="Person ID Card" value="{{ old('ceo_id_card', $company->ceo_id_card) }}" required>
                                    @error('ceo_id_card')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
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
