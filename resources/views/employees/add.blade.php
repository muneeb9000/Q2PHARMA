@extends('layouts.layout')

@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Add Employee</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Employees', 'url' => route('employee.index'), 'icon' => 'ti ti-users'],
                        ['name' => 'Add Employee', 'icon' => 'ti ti-user-plus'],
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
                        <form method="POST" action="{{ route('employee.store') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Company ID -->
                                <div class="col-md-6">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select class="form-select js-example-basic-single @error('company_id') is-invalid @enderror" id="company_id" name="company_id" required>
                                        <option value="" disabled>Select Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Joining Date -->
                                <div class="col-md-6">
                                    <label for="joining_date" class="form-label">Joining Date</label>
                                    <input type="date" class="form-control @error('joining_date') is-invalid @enderror" id="joining_date" name="joining_date" value="{{ old('joining_date') }}" required>
                                    @error('joining_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Designation ID -->
                                <div class="col-md-6">
                                    <label for="designation_id" class="form-label">Designation</label>
                                    <select class="form-select js-example-basic-single @error('designation_id') is-invalid @enderror" id="designation_id" name="designation_id" required>
                                        <option value="" disabled>Select Designation</option>
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}" {{ old('designation_id') == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('designation_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Department ID -->
                                <div class="col-md-6">
                                    <label for="department_id" class="form-label">Department</label>
                                    <select class="form-select js-example-basic-single @error('department_id') is-invalid @enderror" id="department_id" name="department_id" required>
                                        <option value="" disabled>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Qualification -->
                                <div class="col-md-6">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" value="{{ old('qualification') }}" required>
                                    @error('qualification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Role -->
                                 <div class="col-md-6">
                                    <label for="role_id" class="form-label">Role</label>
                                    <select class="form-select js-example-basic-single @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                                        <option value="" disabled>Select Roles</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select js-example-basic-single @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="MALE" {{ old('gender') == 'MALE' ? 'selected' : '' }}>Male</option>
                                        <option value="FEMALE" {{ old('gender') == 'FEMALE' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Religion -->
                                <div class="col-md-6">
                                    <label for="religion" class="form-label">Religion</label>
                                    <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ old('religion') }}" required>
                                    @error('religion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Blood Group -->
                                <div class="col-md-6">
                                    <label for="blood_group" class="form-label">Blood Group</label>
                                    <select class="form-select js-example-basic-single @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" required>
                                        <option value="" disabled>Select Blood Group</option>
                                        @foreach(['A+', 'A', 'A-', 'B+', 'B', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                            <option value="{{ $group }}" {{ old('blood_group') == $group ? 'selected' : '' }}>{{ $group }}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_group')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}" required>
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <label for="number" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}" required>
                                    @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" required>
                                    @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add Employee</button>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
