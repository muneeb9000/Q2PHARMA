@extends('layouts.layout')
<br>
@section('content')
 <!-- Start::app-content -->
       <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Invoice Details</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchase Invoices', 'url' => route('purchases.invoices'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Invoices Details', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-9">
                        <div class="card custom-card">
                            <div class="card-header d-md-flex d-block">
                                <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                    {{-- <div class="avatar avatar-sm">
                                        <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="">
                                    </div> --}}
                                    <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                                        <div class="h6 fw-semibold mb-0">PAYMENT INVOICE : <span class="text-primary">{{$purchases->bill_no}}</span></div>
                                    </div>
                                </div>
                                 @php
                                    $paymentStatusLabels = [
                                        'un-paid' => 'UN-PAID',
                                        'partially_paid' => 'PARTIALLY PAID',
                                        'paid' => 'PAID',
                                        'returned' => 'RETURNED',
                                    ];
                                @endphp
                                <div class="ms-auto mt-md-0 mt-2"> 
                                   <div class="h6 fw-semibold mb-0">PAYMENT STATUS : <span class="text-primary">{{ $paymentStatusLabels[$purchases->payment_status] ?? 'Unknown' }}</span></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">
                                                    Billing From :
                                                </p>
                                                <p class="fw-bold mb-1">
                                                    {{$purchases->company->company_name}} {{$purchases->company->company_type}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$purchases->company->company_address }}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$purchases->company->company_email}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                   {{$purchases->company->company_number}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                  NTN No: {{$purchases->company->ntn_no}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                  GST No: {{$purchases->company->gst_no}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                  License No: {{$purchases->company->license_no}}
                                                </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                                <p class="text-muted mb-2">
                                                    Billing To :
                                                </p>
                                                <p class="fw-bold mb-1">
                                                    {{$purchases->supplier->sup_company}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                   {{$purchases->supplier->address}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{$purchases->supplier->email}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                   {{$purchases->supplier->phone}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                  NTN No: Not Available 
                                                </p>
                                                <p class="text-muted mb-1">
                                                  Sales Tax No: Not Available
                                                </p>
                                                <p class="text-muted mb-1">
                                                  License No: Not Available
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Bill ID :</p>
                                        <p class="fs-15 mb-1"> {{$purchases->bill_no}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Date Issued :</p>
                                        <p class="fs-15 mb-1">{{ $purchases->created_at->format('Y-m-d') }}</p>
                                      </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Due Date :</p>
                                        <p class="fs-15 mb-1">{{ $purchases->created_at->addDays(7)->format('Y-m-d') }}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Due Amount :</p>
                                    <p class="fs-16 mb-1 fw-semibold">RS {{ number_format($purchases->total_amount, 2, '.', ',') }}</p>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-4">
                                                <thead>
                                                    <tr>
                                                        <th>SKU NUMBER</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>QUANTITY</th>
                                                        <th>PRICE PER UNIT</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($purchases->details as $detail)
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">
                                                              {{$detail->product->sku}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-semibold">
                                                              {{$detail->product->name}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-muted">
                                                            {{$detail->quantity}}
                                                            </div>
                                                        </td>
                                                        <td class="product-quantity-container">
                                                           {{$detail->product->purchase_price}}
                                                        </td>
                                                        <td>
                                                           {{ number_format($detail->product_price * $detail->quantity, 2) }} RS
                                                        </td>
                                                        
                                                    </tr>
                                                      @endforeach
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td colspan="2">
                                                            <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                <tbody>
                                                                     <tr>
                                                                        <th scope="row">
                                                                            <p class="mb-0">Sub Total :</p>
                                                                        </th>
                                                                        <td>
                                                                            <p class="mb-0 fw-semibold fs-15">{{ number_format($purchases->details->sum(function($detail){ return $detail->product_price * $detail->quantity; }), 2) }} RS</p>
                                                                        </td>
                                                                    </tr>
                                                                   <tr>
                                                                    <th scope="row">
                                                                        <p class="mb-0">Total Quantity :</p>
                                                                    </th>
                                                                    <td>
                                                                        <p class="mb-0 fw-semibold fs-15">{{ $purchases->details->sum('quantity') }}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <p class="mb-0">Avail Discount :</p>
                                                                    </th>
                                                                    <td>
                                                                        <p class="mb-0 fw-semibold fs-15">{{ number_format($purchases->details->sum('discounts'), 2) }} RS</p>
                                                                    </td>
                                                                </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <p class="mb-0 fs-14">Total :</p>
                                                                        </th>
                                                                        <td>
                                                                            <p class="mb-0 fw-semibold fs-16 text-success">{{ number_format($purchases->total_amount, 2) }} RS</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                <div>
                                    <label for="invoice-note" class="form-label">Payment Terms: </label>
                                        <textarea class="form-control " id="invoice-note" rows="6" style="height: auto;">
• Payment is due within 7 days of the invoice date.
• Late Payment: A late fee of 5% will be applied to invoices not paid within 30 days.
• Refund Policy: Goods/services are non-refundable once delivered.
• Dispute Resolution: Any disputes regarding this invoice must be reported within 30 days.
• Ownership: Goods remain the property of Q2Pharma until full payment is received.
                                         </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-success">Download <i class="ri-download-2-line ms-1 align-middle"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Add Payment
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                  <form action="{{ route('purchasepayment', $purchases->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-xl-12">
                                            <p class="fs-14 fw-semibold">
                                                Payee's Name
                                            </p>
                                            <p>
                                                <input type="text" class="form-control fs-12" name="payee_name" placeholder="{{ $purchases->payee_name ?? 'Payee_Name' }}" aria-label="Payee's Name" required>
                                            </p>
                                            <p class="fs-14 fw-semibold">Amount</p>
                                            <p>
                                                <input type="text" class="form-control fs-12" value="{{ number_format($purchases->total_amount, 2) }} RS" aria-label="Amount" readonly>
                                            </p>
                                            
                                            <div class="ms-auto mt-md-0 mt-2">
                                                 @if ($purchases->payment_status !== 'paid')
                                                <button type="submit" class="btn btn-sm btn-secondary me-1">
                                                    Pay this Invoice
                                                    <i class="ri-currency-line ms-1 align-middle d-inline-block"></i>
                                                </button>
                                            @endif
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
            </div>
        </div>
        <!-- End::app-content -->
@endsection