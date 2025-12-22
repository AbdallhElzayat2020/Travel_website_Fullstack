@extends('dashboard.layouts.master')

@section('title', 'Pages SEO')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pages SEO Management</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="alert alert-info mb-4">
                <i class="ti ti-info-circle me-2"></i>
                <strong>Note:</strong> You can edit SEO meta tags (Title, Description, Keywords, Author) for all static pages from here.
                These settings will be used in the frontend pages for better SEO and social media sharing.
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Slug</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td><strong>{{ $page->name }}</strong></td>
                                <td><code>{{ $page->slug }}</code></td>
                                <td>{!! $page->meta_title ? \Illuminate\Support\Str::limit($page->meta_title, 50) : '<span class="text-muted">Not set</span>' !!}</td>
                                <td>{!! $page->meta_description ? \Illuminate\Support\Str::limit($page->meta_description, 60) : '<span class="text-muted">Not set</span>' !!}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-primary">
                                        <i class="ti ti-edit me-1"></i>
                                        Edit SEO
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted mb-2">No pages found.</p>
                                    <small class="text-muted">Please run the seeder to create default pages:</small><br>
                                    <code class="d-inline-block mt-2">php artisan db:seed --class=PageSeeder</code>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
