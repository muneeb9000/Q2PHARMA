@extends('layouts.layout')
<br>
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Set Permissions</h1>
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
      <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">{{ $roles->name }}</div>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('roles.updatePermissions', $roles->id) }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap content-table" style="width:100%">
                                <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>Permission Assign to Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modules as $module)
                            <tr>
                                <td colspan="3" class="bg-light text-dark"><strong>{{ $module->name }}</strong>
                                
                                </td>
                            </tr>
                            @foreach($permissions->where('module_id', $module->id) as $permission)
                            <tr>
                                <!-- Module avatar (you can use a placeholder or relevant image if available) -->
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2 avatar-rounded">
                                            <img src="{{ asset('admin/assets/avatar.png')}}" alt="img">
                                        </span>{{ $permission->name }}
                                    </div>
                                </th>
                                <td>
                                    <select name="permissions[{{ $permission->id }}]" class="form-select">
                                        <option value="allow" {{ $roles->hasPermissionTo($permission) ? 'selected' : '' }}>Allow</option>
                                        <option value="not_allow" {{ !$roles->hasPermissionTo($permission) ? 'selected' : '' }}>Not Allow</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </form>
        </div>
    </div>
</div>
@endsection
<!-- CSS Links -->
<link rel="stylesheet" href="{{asset('admin/assets/libs/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/styles.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/icons.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/libs/node-waves/waves.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/libs/simplebar/simplebar.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/libs/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/libs/@simonwep/pickr/themes/nano.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('#file-export').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
