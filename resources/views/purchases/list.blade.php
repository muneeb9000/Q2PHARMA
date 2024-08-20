@extends('layouts.layout')
<br>
@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Purchases List</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchases List', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <!-- Page Header Close --> 
        <div class="row">   
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Purchases List
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Purchase Bill</th>
                                            <th scope="col">Supplier</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Purchase Status</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Purchase Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($purchases)
                                            @foreach($purchases as $index => $purchase)
                                                <tr class="product-list">
                                                   <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="fw-semibold">
                                                                @if ($purchase->company)
                                                                {{ $purchase->company->company_name }}
                                                            @else
                                                                No Company Name
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $purchase->bill_no }}
                                                    </td>
                                                    <td>{{ $purchase->supplier->name }}</td>
                                                    <td>{{ $purchase->total_amount }}</td>
                                                    @php
                                                        $purchaseStatusLabels = [
                                                            1 => 'Pending',
                                                            2 => 'Completed',
                                                            3 => 'Cancelled',
                                                            4 => 'Returned',
                                                        ];

                                                        $paymentStatusLabels = [
                                                            1 => 'Unpaid',
                                                            2 => 'Partially Paid',
                                                            3 => 'Paid',
                                                            4 => 'Overdue',
                                                        ];
                                                    @endphp
                                                        <td>
                                                            <span class="badge bg-secondary">
                                                                {{ $purchaseStatusLabels[$purchase->purchase_status] ?? 'Unknown' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-secondary">
                                                                {{ $paymentStatusLabels[$purchase->payment_status] ?? 'Unknown' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ $purchase->purchase_date }}
                                                        </td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                             <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-icon btn-sm btn-primary-light"><i class="ri-eye-line"></i></a>
                                                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></a>
                                                            <form method="POST" action="{{ route('purchases.destroy', $purchase->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-sm btn-danger-light product-btn"><i class="ri-delete-bin-line"></i></button>
                                                            </form>                                                    
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    {{ $purchases->links() }} <!-- Dynamically generated pagination links -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
