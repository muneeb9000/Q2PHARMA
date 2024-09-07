@extends('layouts.layout')
<br>
@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::page-header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <p class="fw-semibold fs-18 mb-0">Welcome back</p>
                <span class="fs-semibold text-muted">Track your statistics activity, sales, and purchases here.</span>
            </div>
        </div>
        <!-- End::page-header -->
        <!-- Start::row-1 -->
        <div class="row">
            <!-- Total Sales -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center ecommerce-icon px-0">
                                <span class="rounded p-3 bg-primary-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-white primary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><path d="M18,6h-2c0-2.21-1.79-4-4-4S8,3.79,8,6H6C4.9,6,4,6.9,4,8v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8C20,6.9,19.1,6,18,6z M12,4c1.1,0,2,0.9,2,2h-4C10,4.9,10.9,4,12,4z M18,20H6V8h2v2c0,0.55,0.45,1,1,1s1-0.45,1-1V8h4v2c0,0.55,0.45,1,1,1s1-0.45,1-1V8 h2V20z"/></g></svg>
                                </span>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ps-0">
                                <div class="mb-2">Total Sales</div>
                                <div class="text-muted mb-1 fs-12">
                                    <span class="text-dark fw-semibold fs-20 lh-1 vertical-bottom">
                                     {{ number_format($totalSales, 2) }}
                                    </span>
                                </div>
                                <div>
                                    <span class="fs-12 mb-0">Increase by <span class="badge bg-success-transparent text-success mx-1">{{$formattedSalesChangePercentage}}</span> this month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Expenses -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center ecommerce-icon secondary px-0">
                                <span class="rounded p-3 bg-secondary-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-white secondary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0,0h24v24H0V0z" fill="none"/><g><path d="M19.5,3.5L18,2l-1.5,1.5L15,2l-1.5,1.5L12,2l-1.5,1.5L9,2L7.5,3.5L6,2v14H3v3c0,1.66,1.34,3,3,3h12c1.66,0,3-1.34,3-3V2 L19.5,3.5z M15,20H6c-0.55,0-1-0.45-1-1v-1h10V20z M19,19c0,0.55-0.45,1-1,1s-1-0.45-1-1v-3H8V5h11V19z"/><rect height="2" width="6" x="9" y="7"/><rect height="2" width="2" x="16" y="7"/><rect height="2" width="6" x="9" y="10"/><rect height="2" width="2" x="16" y="10"/></g></svg>
                                </span>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ps-0">
                                <div class="mb-2">Total Purchases</div>
                                <div class="text-muted mb-1 fs-12">
                                    <span class="text-dark fw-semibold fs-20 lh-1 vertical-bottom">
                                      {{number_format($totalPurchases,2) }}
                                    </span>
                                </div>
                                <div>
                                    <span class="fs-12 mb-0">Increase by <span class="badge bg-success-transparent text-success mx-1">{{$formattedPurchasesChangePercentage}}</span> this month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Visitors -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center ecommerce-icon success px-0">
                                <span class="rounded p-3 bg-success-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-white success" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </span>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ps-0">
                                <div class="mb-2">Total Customers</div>
                                <div class="text-muted mb-1 fs-12">
                                    <span class="text-dark fw-semibold fs-20 lh-1 vertical-bottom">
                                      {{$totalCustomers }}
                                    </span>
                                </div>
                                <div>
                                   <span class="fs-12 mb-0">Increase by <span class="badge bg-success-transparent text-success mx-1">{{$formattedCustomersChangePercentage}}</span> this month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Orders -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center ecommerce-icon warning px-0">
                                <span class="rounded p-3 bg-warning-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-white warning" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 12h7v-2h-7V7l-5 5 5 5v-3z"/></svg>
                                </span>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ps-0">
                                <div class="mb-2">Total Sales Man</div>
                                <div class="text-muted mb-1 fs-12">
                                    <span class="text-dark fw-semibold fs-20 lh-1 vertical-bottom">
                                       {{-- {{ $totalEmployees }} --}}
                                    </span>
                                </div>
                                <div>
                                    <span class="fs-12 mb-0">Increased by <span class="badge bg-success-transparent text-success mx-1">+8.2%</span> this month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->
            <!-- Revenue Analytics Section -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Revenue Analytics</div>
                       <div class="dropdown">
                            <a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                View All<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="javascript:void(0);" data-period="today">Today</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" data-period="this-week">This Week</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" data-period="last-week">Last Week</a></li>
                                <li><a class="dropdown-item active" href="javascript:void(0);" data-period="this-year">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="crm-revenue-analytics"></div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Employee Sales
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <div>
                            <input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover border table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sales Rep</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center fw-semibold">
                                            Mayor Kelly
                                        </div>
                                    </td>
                                    <td>Manufacture</td>
                                    <td>mayorkelly@gmail.com</td>
                                    <td>
                                        <span class="badge bg-info-transparent">Germany</span>
                                    </td>
                                    <td>Sep 15 - Oct 12, 2023</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('admin/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    var chart = new ApexCharts(document.querySelector("#crm-revenue-analytics"), {
        chart: {
            type: 'line',
            height: 350
        },
        series: [
            {
                name: 'Total Sales',
                data: []
            },
            {
                name: 'Total Purchases',
                data: []
            }
        ],
        xaxis: {
            categories: []
        }
    });
    chart.render();
    function updateChart(period) {
        fetch(`/chart-data?period=${period}`)
            .then(response => response.json())
            .then(data => {
                chart.updateOptions({
                    series: [
                        {
                            name: 'Total Sales',
                            data: data.salesData
                        },
                        {
                            name: 'Total Purchases',
                            data: data.purchasesData
                        }
                    ],
                    xaxis: {
                        categories: data.categories
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    var defaultPeriod = 'this-year';
    updateChart(defaultPeriod);
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelector('.dropdown-item.active').classList.remove('active');
            this.classList.add('active');
            var period = this.getAttribute('data-period');
            updateChart(period);
        });
    });
});
</script>
@endpush
