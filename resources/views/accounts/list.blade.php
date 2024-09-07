@extends('layouts.layout')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">TRANSACTIONS LIST</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Transactions', 'url' => route('accounts.index'), 'icon' => 'ti ti-wallet'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Transactions List</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap content-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Transaction Type</th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($transactions)
                                    @foreach($transactions as $index => $transaction)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $transaction->company->company_name }}</td>
                                        <td>{{ ucfirst(strtolower($transaction->trans_type)) }}</td>
                                        <td>{{ $transaction->reference }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->trans_date }}</td>
                                        <td>{{ ucfirst(strtolower($transaction->pay_via)) }}</td>
                                        <td>{{ $transaction->description ?? '-' }}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{ route('accounts.edit', $transaction->id) }}" class="btn btn-icon btn-sm btn-info-light m-1"><i class="ri-edit-line"></i></a>
                                                <form method="POST" action="{{ route('accounts.destroy', $transaction->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light m-1"><i class="ri-delete-bin-line"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- CSS Links (unchanged) -->
<link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/styles.min.css">
<link rel="stylesheet" href="../assets/css/icons.css">
<link rel="stylesheet" href="../assets/libs/node-waves/waves.min.css">
<link rel="stylesheet" href="../assets/libs/simplebar/simplebar.min.css">
<link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css">
<link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

<!-- JS Scripts (unchanged) -->
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
