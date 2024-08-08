@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Sub Area</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-1'],
                        ['name' => 'Route Management', 'url' => route('subarea.index'), 'icon' => 'ti ti-building'],
                        ['name' => 'Edit Sub Area', 'icon' => 'ti ti-edit'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Edit Form -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form action="{{ route('subarea.update', $subarea->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="company-dropdown" class="form-label fs-14 text-dark">Company</label>
                                    <select id="company-dropdown" name="company_id" class="form-control js-example-basic-single">
                                        <option value="">Select a Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $company->id == $subarea->company_id ? 'selected' : '' }}>
                                                {{ $company->company_name }}
                                            </option>
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
                                    <input type="text" class="form-control" id="form-text" name="sub_area_name" value="{{ old('sub_area_name', $subarea->sub_area_name) }}" placeholder="Sub Area Name">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
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

    // Function to populate cities and areas
    function populateDropdowns(companyId, cityId, areaId) {
        var cityDropdown = $('#city-dropdown');
        var areaDropdown = $('#area-dropdown');

        if (companyId) {
            $.ajax({
                url: `/get-cities/${companyId}`,
                type: 'GET',
                success: function(data) {
                    cityDropdown.empty().append('<option value="">Select a City</option>');
                    $.each(data, function(index, city) {
                        cityDropdown.append(`<option value="${city.id}">${city.city_name}</option>`);
                    });

                    // Select the city based on provided cityId
                    if (cityId) {
                        cityDropdown.val(cityId).trigger('change');
                    } else {
                        cityDropdown.trigger('change');
                    }
                }
            });
        } else {
            cityDropdown.empty().append('<option value="">Select a City</option>');
            areaDropdown.empty().append('<option value="">Select an Area</option>');
        }
    }

    // Function to populate areas based on cityId
    function populateAreas(cityId, areaId) {
        var areaDropdown = $('#area-dropdown');

        if (cityId) {
            $.ajax({
                url: `/get-areas/${cityId}`,
                type: 'GET',
                success: function(data) {
                    areaDropdown.empty().append('<option value="">Select an Area</option>');
                    $.each(data, function(index, area) {
                        areaDropdown.append(`<option value="${area.id}">${area.area_name}</option>`);
                    });

                    // Select the area based on provided areaId
                    if (areaId) {
                        areaDropdown.val(areaId).trigger('change');
                    } else {
                        areaDropdown.trigger('change');
                    }
                }
            });
        } else {
            areaDropdown.empty().append('<option value="">Select an Area</option>');
        }
    }

    // Handle company dropdown change
    $('#company-dropdown').change(function() {
        var companyId = $(this).val();
        var cityId = "{{ $subarea->city_id }}";
        var areaId = "{{ $subarea->area_id }}";

        populateDropdowns(companyId, cityId, areaId);
    });

    // Handle city dropdown change
    $('#city-dropdown').change(function() {
        var cityId = $(this).val();
        var areaId = "{{ $subarea->area_id }}";

        populateAreas(cityId, areaId);
    });

    // Initialize dropdowns on page load
    var companyId = "{{ $subarea->company_id }}";
    var cityId = "{{ $subarea->city_id }}";
    var areaId = "{{ $subarea->area_id }}";

    populateDropdowns(companyId, cityId, areaId);

    // Set initial values for city and area dropdowns
    $('#city-dropdown').val(cityId).trigger('change');
    $('#area-dropdown').val(areaId).trigger('change');
});
</script>
