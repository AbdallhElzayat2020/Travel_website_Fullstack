@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <!-- Statistics Cards -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Categories</h6>
                            <h3 class="mb-0">{{ $totalCategories }}</h3>
                        </div>
                        <div class="avatar avatar-lg bg-label-primary">
                            <i class="ti ti-folder ti-md"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Active Categories</h6>
                            <h3 class="mb-0">{{ $activeCategories }}</h3>
                        </div>
                        <div class="avatar avatar-lg bg-label-success">
                            <i class="ti ti-check ti-md"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Sub Categories</h6>
                            <h3 class="mb-0">{{ $totalSubCategories }}</h3>
                        </div>
                        <div class="avatar avatar-lg bg-label-info">
                            <i class="ti ti-folder-plus ti-md"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Users</h6>
                            <h3 class="mb-0">{{ $totalUsers }}</h3>
                        </div>
                        <div class="avatar avatar-lg bg-label-warning">
                            <i class="ti ti-users ti-md"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Categories -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Categories</h5>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentCategories->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentCategories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-label-{{ $category->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($category->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $category->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted text-center mb-0">No categories found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Sub Categories -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Sub Categories</h5>
                    <a href="{{ route('admin.sub-categories.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentSubCategories->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentSubCategories as $subCategory)
                                        <tr>
                                            <td>{{ $subCategory->name }}</td>
                                            <td>{{ $subCategory->category->name ?? '-' }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-label-{{ $subCategory->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($subCategory->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $subCategory->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted text-center mb-0">No sub categories found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Categories Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Categories Growth (Last 6 Months)</h5>
                </div>
                <div class="card-body">
                    @if($categoriesChartData->count() > 0)
                        <canvas id="categoriesChart" height="100"></canvas>
                    @else
                        <p class="text-muted text-center mb-0">No data available for chart.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sub Categories Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Sub Categories Growth (Last 6 Months)</h5>
                </div>
                <div class="card-body">
                    @if($subCategoriesChartData->count() > 0)
                        <canvas id="subCategoriesChart" height="100"></canvas>
                    @else
                        <p class="text-muted text-center mb-0">No data available for chart.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Categories Chart
        @if($categoriesChartData->count() > 0)
            const categoriesCtx = document.getElementById('categoriesChart');
            if (categoriesCtx) {
                const categoriesData = @json($categoriesChartData);
                const labels = categoriesData.map(item => {
                    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    return monthNames[item.month - 1] + ' ' + item.year;
                });
                const counts = categoriesData.map(item => item.count);

                new Chart(categoriesCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Categories',
                            data: counts,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        @endif

            // Sub Categories Chart
            @if($subCategoriesChartData->count() > 0)
                const subCategoriesCtx = document.getElementById('subCategoriesChart');
                if (subCategoriesCtx) {
                    const subCategoriesData = @json($subCategoriesChartData);
                    const subLabels = subCategoriesData.map(item => {
                        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        return monthNames[item.month - 1] + ' ' + item.year;
                    });
                    const subCounts = subCategoriesData.map(item => item.count);

                    new Chart(subCategoriesCtx, {
                        type: 'line',
                        data: {
                            labels: subLabels,
                            datasets: [{
                                label: 'Sub Categories',
                                data: subCounts,
                                borderColor: 'rgb(255, 99, 132)',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            @endif
    </script>
@endpush
