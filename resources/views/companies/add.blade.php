@extends('layouts.layout')
<br>
@section('content')
<!-- Start::app-content -->

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">COMPANY ADD</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Company', 'url' => route('companies.index'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Company Add', 'icon' => 'ti ti-building'],
                        ];
                    @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body add-products p-4">
                        <form method="POST" action="{{ route('companies.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="company-name" class="form-label">Company Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company-name" name="company_name" placeholder="Company Name" required>
                                    @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-type" class="form-label">Company Type</label>
                                    <input type="text" class="form-control @error('company_type') is-invalid @enderror" id="company-type" name="company_type" placeholder="Company Type">
                                    @error('company_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('company_email') is-invalid @enderror" id="company-email" name="company_email" placeholder="Email" required>
                                    @error('company_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-number" class="form-label">Mobile No</label>
                                    <input type="tel" class="form-control @error('company_number') is-invalid @enderror" id="company-number" name="company_number" placeholder="Mobile No" required>
                                    @error('company_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('company_city') is-invalid @enderror" id="company-city" name="company_city" placeholder="City" required>
                                    @error('company_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('company_state') is-invalid @enderror" id="company-state" name="company_state" placeholder="State">
                                    @error('company_state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company-address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('company_address') is-invalid @enderror" id="company-address" name="company_address" placeholder="Address" required>
                                    @error('company_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-no" class="form-label">License No</label>
                                    <input type="text" class="form-control @error('license_no') is-invalid @enderror" id="license-no" name="license_no" placeholder="License No" required>
                                    @error('license_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ntn-no" class="form-label">NTN No</label>
                                    <input type="text" class="form-control @error('ntn_no') is-invalid @enderror" id="ntn-no" name="ntn_no" placeholder="NTN No" required>
                                    @error('ntn_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gst-no" class="form-label">GST No</label>
                                    <input type="text" class="form-control @error('gst_no') is-invalid @enderror" id="gst-no" name="gst_no" placeholder="GST No" required>
                                    @error('gst_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-issuance-date" class="form-label">License Issuance Date</label>
                                    <input type="date" class="form-control @error('license_issue_date') is-invalid @enderror" id="license-issuance-date" name="license_issue_date" placeholder="License Issuance Date" required>
                                    @error('license_issue_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license-expiry-date" class="form-label">License Expiry Date</label>
                                    <input type="date" class="form-control @error('license_expiry_date') is-invalid @enderror" id="license-expiry-date" name="license_expiry_date" placeholder="License Expiry Date" required>
                                    @error('license_expiry_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-name" class="form-label">CEO/Representative Name</label>
                                    <input type="text" class="form-control @error('ceo_name') is-invalid @enderror" id="ceo-name" name="ceo_name" placeholder="CEO/Representative Name" required>
                                    @error('ceo_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-number" class="form-label">Person Phone</label>
                                    <input type="tel" class="form-control @error('ceo_number') is-invalid @enderror" id="ceo-number" name="ceo_number" placeholder="Person Phone" required>
                                    @error('ceo_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-email" class="form-label">Person Email</label>
                                    <input type="email" class="form-control @error('ceo_email') is-invalid @enderror" id="ceo-email" name="ceo_email" placeholder="Person Email" required>
                                    @error('ceo_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-city" class="form-label">Person City</label>
                                    <input type="text" class="form-control @error('ceo_city') is-invalid @enderror" id="ceo-city" name="ceo_city" placeholder="Person City" required>
                                    @error('ceo_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-address" class="form-label">Person Address</label>
                                    <input type="text" class="form-control @error('ceo_address') is-invalid @enderror" id="ceo-address" name="ceo_address" placeholder="Person Address" required>
                                    @error('ceo_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ceo-id-card" class="form-label">Person ID Card</label>
                                    <input type="text" class="form-control @error('ceo_id_card') is-invalid @enderror" id="ceo-id-card" name="ceo_id_card" placeholder="Person ID Card" required>
                                    @error('ceo_id_card')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
