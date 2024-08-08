@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Cities</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-1'],
                        ['name' => 'Route Management', 'icon' => 'ti ti-building'],
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
                            <form action="{{ route('city.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="company-dropdown" class="form-label fs-14 text-dark">Company</label>
                                    <select id="company-dropdown" name="company_id" class="form-control js-example-basic-single">
                                        <option value="">Select a Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">City Name</label>
                                    <input type="text" class="form-control" id="form-text" name="city_name" placeholder="City Name">
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                        <div class="card-footer d-none border-top-0"></div>
                    </div>
                </div>
                <!-- Table -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Company</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cities as $city)
                                            <tr>
                                                <td>{{ $city->company->company_name ?? 'No Company' }}</td>
                                                <td>{{ $city->city_name }}</td>
                                                <td>{{ $city->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="{{ route('city.edit', $city->id) }}" class="btn btn-icon btn-sm btn-info-light m-1"><i class="ri-edit-line"></i></a>
                                                        <form method="POST" action="{{ route('city.destroy', $city->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-icon btn-sm btn-danger-light m-1"><i class="ri-delete-bin-line"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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