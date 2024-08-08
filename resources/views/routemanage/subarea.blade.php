@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Sub Areas</h1>
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
                            <form action="{{ route('subarea.store') }}" method="POST">
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
                                    <label for="city-dropdown" class="form-label fs-14 text-dark">City</label>
                                    <select id="city-dropdown" name="city_id" class="form-control js-example-basic-single">
                                        <option value="">Select a City</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="area-dropdown" class="form-label fs-14 text-dark">Area</label>
                                    <select id="area-dropdown" name="area_id" class="form-control js-example-basic-single">
                                        <option value="">Select an Area</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">Sub Area Name</label>
                                    <input type="text" class="form-control" id="form-text" name="sub_area_name" placeholder="Sub Area Name">
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
                                            <th scope="col">Area</th>
                                            <th scope="col">Sub Area Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subareas as $subarea)
                                            <tr>
                                                <td>{{ $subarea->company->company_name }}</td>
                                                <td>{{ $subarea->city->city_name }}</td>
                                                <td>{{ $subarea->area->area_name }}</td>
                                                <td>{{ $subarea->sub_area_name }}</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="{{ route('subarea.edit', $subarea->id) }}" class="btn btn-icon btn-sm btn-info-light m-1"><i class="ri-edit-line"></i></a>
                                                        <form method="POST" action="{{ route('subarea.destroy', $subarea->id) }}">
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
    
    $('#company-dropdown').change(function() {
        let companyId = $(this).val();
        if (companyId) {
            $.ajax({
                url: `/get-cities/${companyId}`,
                type: 'GET',
                success: function(data) {
                    $('#city-dropdown').empty().append('<option value="">Select a City</option>');
                    $.each(data, function(index, city) {
                        $('#city-dropdown').append(`<option value="${city.id}">${city.city_name}</option>`);
                    });
                }
            });
        } else {
            $('#city-dropdown').empty().append('<option value="">Select a City</option>');
        }
    });

    $('#city-dropdown').change(function() {
        let cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: `/get-areas/${cityId}`,
                type: 'GET',
                success: function(data) {
                    $('#area-dropdown').empty().append('<option value="">Select an Area</option>');
                    $.each(data, function(index, area) {
                        $('#area-dropdown').append(`<option value="${area.id}">${area.area_name}</option>`);
                    });
                }
            });
        } else {
            $('#area-dropdown').empty().append('<option value="">Select an Area</option>');
        }
    });
});
</script>
