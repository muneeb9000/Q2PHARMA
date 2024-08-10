@extends('layouts.layout')
<br>
@section('content')
<!-- In resources/views/products/add.blade.php -->
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Product List</h1>
            <div class="ms-md-1 ms-0">
                @php
                    $breadcrumbs = [
                        ['name' => 'Dashboard', 'url' => route('home'), 'icon' => 'ti ti-home-2'],
                        ['name' => 'Product List', 'icon' => 'ti ti-plus'],
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
                            Products List
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Batch No</th>
                                            <th scope="col">Purchase Unit</th>
                                            <th scope="col">Sale Unit</th>
                                            <th scope="col">Ratio</th>
                                            <th scope="col">Purchase Price</th>
                                            <th scope="col">Sale Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($products)
                                            @foreach($products as $index => $product)
                                                <tr class="product-list">
                                                   <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="fw-semibold">
                                                                {{ $product->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-light text-default">{{ $product->categories->name }}</span>
                                                    </td>
                                                    <td>{{ $product->batch_number }}</td>
                                                     <td>
                                                @if($product->purchaseUnit)
                                                    {{ $product->purchaseUnit->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->saleUnit)
                                                    {{ $product->saleUnit->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                                    <td>{{ $product->unit_ratio }}</td>
                                                    <td>{{ $product->purchase_price }}</td>
                                                    <td>{{ $product->sale_price }}</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                             <a href="{{ route('products.show', $product->id) }}" class="btn btn-icon btn-sm btn-primary-light"><i class="ri-eye-line"></i></a>
                                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></a>
                                                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
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
                                    {{ $products->links() }} <!-- Dynamically generated pagination links -->
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
