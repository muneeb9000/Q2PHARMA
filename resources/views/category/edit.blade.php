@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Category</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-1'],
                        ['name' => 'Category', 'url' => route('category.index'), 'icon' => 'ti ti-building'],
                        ['name' => 'Edit Category', 'icon' => 'ti ti-pencil'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Entry Form -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form action="{{ route('category.update', $categories->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="company-id" class="form-label fs-14 text-dark">Company</label>
                                    <select id="company-id" name="company_id" class="form-control js-example-basic-single">
                                        <option value="">Select a Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $categories->company_id == $company->id ? 'selected' : '' }}>
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">Category Name</label>
                                    <input type="text" class="form-control" id="form-text" name="name" placeholder="Category Name" value="{{ $categories->name }}">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                        <div class="card-footer d-none border-top-0"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
