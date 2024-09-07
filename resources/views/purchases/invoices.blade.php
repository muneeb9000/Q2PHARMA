@extends('layouts.layout')
<br>
@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Purchases Invoices</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchases Invoices', 'icon' => 'ti ti-plus'],
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
                            Purchases Invoices
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Bill No</th>
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
                                                            'pending' => 'Pending',
                                                            'received' => 'Received',
                                                            'ordered' => 'Ordered',
                                                            'returned' => 'Returned',
                                                        ];

                                                        $paymentStatusLabels = [
                                                            'un-paid' => 'Unpaid',
                                                            'partially_paid' => 'Partially Paid',
                                                            'paid' => 'Paid',
                                                            'returned' => 'Returned',
                                                        ];
                                                    @endphp
                                                        <td> {{ $purchaseStatusLabels[$purchase->purchase_status] ?? 'Unknown' }}</td>
                                                        <td> {{ $paymentStatusLabels[$purchase->payment_status] ?? 'Unknown' }}   </td>
                                                        <td>{{ $purchase->purchase_date }}</td>
                                                    <td>
                                                     <div class="hstack gap-2 fs-15">
                                                        <a href="{{ route('purchases.print', $purchase->id) }}" class="btn btn-icon btn-sm btn-primary-light">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
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
