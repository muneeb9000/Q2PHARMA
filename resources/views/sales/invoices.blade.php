@extends('layouts.layout')
<br>
@section('content')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Sales Invoices</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Sales Invoices', 'icon' => 'ti ti-plus'],
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
                            Sales Invoices
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Invoice No</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Sale Status</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Sale Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($sales)
                                            @foreach($sales as $index => $sale)
                                                <tr class="product-list">
                                                   <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="fw-semibold">
                                                                @if ($sale->company)
                                                                {{ $sale->company->company_name }}
                                                            @else
                                                                No Company Name
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $sale->invoice_no }}
                                                    </td>
                                                   <td>{{ $sale->customers ? $sale->customers->business_name : 'N/A' }}</td>
                                                    <td>{{ $sale->total_amount }}</td>
                                                   @php
                                                        $saleStatusLabels = [
                                                            'pending' => 'PENDING',
                                                            'completed' => 'RECEIVED',
                                                            'returned' => 'RETURNED',
                                                        ];

                                                        $paymentStatusLabels = [
                                                            'un-paid' => 'UN-PAID',
                                                            'partially_paid' => 'PARTIALLY PAID',
                                                            'paid' => 'PAID',
                                                            'returned' => 'RETURNED',
                                                        ];
                                                    @endphp

                                                        <td>
                                                            <span class="fw-semibold">
                                                                {{ $saleStatusLabels[$sale->sale_status] ?? 'Unknown' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-semibold" >
                                                                {{ $paymentStatusLabels[$sale->payment_status] ?? 'Unknown' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ $sale->sale_date }}
                                                        </td>
                                                    <td>
                                                     <div class="hstack gap-2 fs-15">
                                                            <!-- View Button is always available -->
                                                            <a href="{{ route('sales.print', ['id' => $sale->id]) }}" class="btn btn-icon btn-sm btn-primary-light">
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
                                    {{ $sales->links() }} <!-- Dynamically generated pagination links -->
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
