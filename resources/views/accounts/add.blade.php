@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">ADD TRANSACTION</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Accounts', 'url' => route('accounts.index'), 'icon' => 'ti ti-user'],
                        ['name' => 'Add New Transaction', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('accounts.store') }}" method="POST" class="row g-3 mt-0">
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
                                <label for="trans_type" class="form-label">Transaction Type</label>
                                <select class="form-control js-example-basic-single" id="trans_type" name="trans_type">
                                    <option value="">Select Transaction Type</option>
                                    @foreach($transTypes as $type)
                                        <option value="{{ $type }}">{{ ucfirst(strtolower($type)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="reference" class="form-label">Reference</label>
                                <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference">
                            </div>
                            <div class="col-md-12">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="amount" class="form-control" id="amount" name="amount" placeholder="Amount">
                            </div>
                            <div class="col-md-12">
                                <label for="trans_date" class="form-label">Transaction Date</label>
                                <input type="date" class="form-control" id="trans_date" name="trans_date" placeholder="Transaction Date">
                            </div>
                           <div class="col-md-12">
                                <label for="pay_via" class="form-label">Pay Via</label>
                                <select class="form-control js-example-basic-single" id="pay_via" name="pay_via">
                                    <option value="">Select Payment Method</option>
                                    @foreach($payViaOptions as $option)
                                        <option value="{{ $option }}">{{ ucfirst(strtolower($option)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Transactions</button>
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
