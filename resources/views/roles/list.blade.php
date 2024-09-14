@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Roles</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-1'],
                        ['name' => 'Roles Management', 'icon' => 'ti ti-building'],
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
                            <form action="{{ route('roles.store') }}" method="POST">
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
                                    <label for="form-text" class="form-label fs-14 text-dark">Role Name</label>
                                    <input type="text" class="form-control" id="form-text" name="name" placeholder="Role Name">
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
                                            <th scope="col">Role</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{ $role->company->company_name }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                          <!-- Show button -->
                                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-icon btn-sm btn-primary-light m-1">
                                                            <i class="ri-eye-line"></i>
                                                        </a>

                                                        <!-- Edit button -->
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-icon btn-sm btn-info-light m-1">
                                                            <i class="ri-edit-line"></i>
                                                        </a>

                                                        <!-- Delete form -->
                                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-icon btn-sm btn-danger-light m-1">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
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