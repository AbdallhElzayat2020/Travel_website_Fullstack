@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-category text-primary" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Categories</span>
                    <h3 class="card-title mb-2">{{ $totalCategories }}</h3>
                    <small class="text-success fw-semibold">
                        <i class="ti ti-arrow-up"></i>
                        {{ $activeCategories }} Active
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-category-2 text-info" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Sub Categories</span>
                    <h3 class="card-title mb-2">{{ $totalSubCategories }}</h3>
                    <small class="text-success fw-semibold">
                        <i class="ti ti-arrow-up"></i>
                        {{ $activeSubCategories }} Active
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-users text-success" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Users</span>
                    <h3 class="card-title mb-2">{{ $totalUsers }}</h3>
                    <small class="text-muted">All Users</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="ti ti-chart-bar text-warning" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Activity Rate</span>
                    <h3 class="card-title mb-2">
                        {{ $totalCategories > 0 ? round(($activeCategories / $totalCategories) * 100) : 0 }}%
                    </h3>
                    <small class="text-muted">Active Categories</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Categories Statistics (Last 6 Months)</h5>
                </div>
                <div class="card-body">
                    <div id="categoriesChart" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sub Categories Statistics (Last 6 Months)</h5>
                </div>
                <div class="card-body">
                    <div id="subCategoriesChart" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Items Row -->
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Categories</h5>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-label-primary">
                        View All
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentCategories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($category->image)
                                                    <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                                        alt="{{ $category->name }}" class="rounded me-2"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                                <div>
                                                    <h6 class="mb-0">{{ $category->name }}</h6>
                                                    <small class="text-muted">{{ $category->slug }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($category->status == 'active')
                                                <span class="badge bg-label-success">Active</span>
                                            @else
                                                <span class="badge bg-label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $category->created_at->format('Y-m-d') }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Sub Categories</h5>
                    <a href="{{ route('admin.sub-categories.index') }}" class="btn btn-sm btn-label-primary">
                        View All
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentSubCategories as $subCategory)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($subCategory->image)
                                                    <img src="{{ getImageUrl($subCategory->image, 'sub_categories') }}"
                                                        alt="{{ $subCategory->name }}" class="rounded me-2"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                                <div>
                                                    <h6 class="mb-0">{{ $subCategory->name }}</h6>
                                                    <small class="text-muted">{{ $subCategory->slug }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-label-primary">{{ $subCategory->category->name }}</span>
                                        </td>
                                        <td>
                                            @if($subCategory->status == 'active')
                                                <span class="badge bg-label-success">Active</span>
                                            @else
                                                <span class="badge bg-label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $subCategory->created_at->format('Y-m-d') }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No sub categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Categories Chart
        const categoriesChartData = @json($categoriesChartData);
        const categoriesLabels = categoriesChartData.map(item => {
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return monthNames[item.month - 1] + ' ' + item.year;
        });
        const categoriesCounts = categoriesChartData.map(item => item.count);

        const categoriesChartOptions = {
            chart: {
                type: 'bar',
                height: 300,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 5
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: categoriesLabels
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            fill: {
                opacity: 1
            },
            colors: ['#696cff'],
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " category"
                    }
                }
            }
        };

        const categoriesChart = new ApexCharts(document.querySelector("#categoriesChart"), {
            ...categoriesChartOptions,
            series: [{
                name: 'Categories',
                data: categoriesCounts
            }]
        });
        categoriesChart.render();

        // Sub Categories Chart
        const subCategoriesChartData = @json($subCategoriesChartData);
        const subCategoriesLabels = subCategoriesChartData.map(item => {
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return monthNames[item.month - 1] + ' ' + item.year;
        });
        const subCategoriesCounts = subCategoriesChartData.map(item => item.count);

        const subCategoriesChartOptions = {
            chart: {
                type: 'line',
                height: 300,
                toolbar: { show: false }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: subCategoriesLabels
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            colors: ['#71dd37'],
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " sub category"
                    }
                }
            }
        };

        const subCategoriesChart = new ApexCharts(document.querySelector("#subCategoriesChart"), {
            ...subCategoriesChartOptions,
            series: [{
                name: 'Sub Categories',
                data: subCategoriesCounts
            }]
        });
        subCategoriesChart.render();
    </script>
@endpush
