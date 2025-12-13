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

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Slug</th>
                            <th>Meta Title</th>
                            <th>Meta Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->name }}</td>
                                <td><code>{{ $page->slug }}</code></td>
                                <td>{{ $page->meta_title ?: '-' }}</td>
                                <td>{{ $page->meta_author ?: '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-primary">
                                        <i class="ti ti-edit me-1"></i>
                                        Edit SEO
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No pages found. Please run seeder to create default pages.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
