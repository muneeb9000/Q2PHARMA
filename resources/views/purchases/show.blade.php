@extends('layouts.layout')
<br>
@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Purchase Details</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Purchases', 'url' => route('purchases.index'), 'icon' => 'ti ti-box'],
                        ['name' => 'Purchase Details', 'icon' => 'ti ti-plus'],
                    ];
                @endphp
                <x-breadcrumb :items="$breadcrumbs" />
            </div>
        </div>
        <!-- Page Header Close --> 
        <!-- Start::row-1 -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">
                            Purchase Bill - <span class="text-primary">#{{ $purchase->bill_no }}</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Products Name</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase->details as $detail)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="mb-1 fs-14 fw-semibold">
                                                            <a href="javascript:void(0);">{{ $detail->product->name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                             <td>
                                                {{ number_format($detail->product_price, 2) }} RS
                                            </td>
                                            <td>{{ $detail->quantity }}</td>
                                             <td>{{ number_format($detail->discounts, 2) }} RS</td>
                                            <td>{{ number_format($detail->product_price * $detail->quantity, 2) }} RS</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <div class="fw-semibold">Total Items :</div>
                                        </td>
                                        <td>{{ $purchase->details->sum('quantity') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <div class="fw-semibold">Sub Total :</div>
                                        </td>
                                        <td>{{ number_format($purchase->details->sum(function($detail){return $detail->product_price * $detail->quantity;}), 2) }} RS</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <div class="fw-semibold">Discount Amount :</div>
                                        </td>
                                        <td>
                                            {{ number_format($purchase->details->sum('discounts'),2) }} RS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <div class="fw-semibold">Total Price :</div>
                                        </td>
                                        <td>
                                            <span class="fs-16 fw-semibold">{{ number_format($purchase->total_amount, 2) }} RS</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-top-0">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
