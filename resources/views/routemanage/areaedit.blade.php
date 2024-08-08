@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Area</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-1'],
                        ['name' => 'Route Management', 'url' => route('area.index'), 'icon' => 'ti ti-building'],
                        ['name' => 'Edit Area', 'icon' => 'ti ti-edit'],
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
                            <form action="{{ route('area.update', $area->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="company-dropdown" class="form-label fs-14 text-dark">Company</label>
                                    <select id="company-dropdown" name="company_id" class="form-control js-example-basic-single">
                                        <option value="">Select a Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $company->id == $area->company_id ? 'selected' : '' }}>
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="city-dropdown" class="form-label fs-14 text-dark">City</label>
                                    <select id="city-dropdown" name="city_id" class="form-control js-example-basic-single">
                                        <option value="">Select a City</option>
                                        <!-- Cities will be populated dynamically -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-text" class="form-label fs-14 text-dark">Area Name</label>
                                    <input type="text" class="form-control" id="form-text" name="area_name" value="{{ old('area_name', $area->area_name) }}" placeholder="Area Name">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                                <a href="{{ route('area.index') }}" class="btn btn-secondary">Cancel</a>
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

    // Populate city dropdown based on selected company
    $('#company-dropdown').on('change', function() {
        var companyId = $(this).val();
        var cityDropdown = $('#city-dropdown');

        if (companyId) {
            $.ajax({
                url: '/get-cities/' + companyId,
                type: 'GET',
                success: function(data) {
                    cityDropdown.empty();
                    cityDropdown.append('<option value="">Select a City</option>');
                    $.each(data, function(index, city) {
                        cityDropdown.append('<option value="' + city.id + '">' + city.city_name + '</option>');
                    });

                    // Set the selected city if available
                    var selectedCityId = "{{ $area->city_id }}";
                    if (selectedCityId) {
                        cityDropdown.val(selectedCityId).trigger('change');
                    }
                }
            });
        } else {
            cityDropdown.empty();
            cityDropdown.append('<option value="">Select a City</option>');
        }
    }).trigger('change'); // Trigger change to set the initial city based on existing company
});
</script>
