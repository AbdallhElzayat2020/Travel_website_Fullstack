@extends('dashboard.layouts.master')

@section('title', 'Edit Page SEO')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit SEO: {{ $page->name }}</h5>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                <i class="ti ti-arrow-left me-1"></i>
                Back
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Page Name</label>
                    <input type="text" class="form-control" value="{{ $page->name }}" disabled>
                    <small class="text-muted">This is the page identifier and cannot be changed.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" value="{{ $page->slug }}" disabled>
                    <small class="text-muted">This is the page URL slug and cannot be changed.</small>
                </div>

                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title <span class="text-danger">*</span></label>
                    <input type="text" name="meta_title" id="meta_title"
                        class="form-control @error('meta_title') is-invalid @enderror"
                        value="{{ old('meta_title', $page->meta_title) }}" maxlength="60"
                        placeholder="Page title for SEO (50-60 characters recommended)">
                    <small class="text-muted">This will be used as the page title in browser tab and search engines.</small>
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="3"
                        class="form-control @error('meta_description') is-invalid @enderror" maxlength="500"
                        placeholder="Brief description for search engines (150-160 characters recommended)">{{ old('meta_description', $page->meta_description) }}</textarea>
                    <small class="text-muted">This will appear in search engine results.</small>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="meta_author" class="form-label">Meta Author</label>
                    <input type="text" name="meta_author" id="meta_author"
                        class="form-control @error('meta_author') is-invalid @enderror"
                        value="{{ old('meta_author', $page->meta_author) }}" maxlength="255" placeholder="Author name">
                    <small class="text-muted">Author of the page content.</small>
                    @error('meta_author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" rows="2"
                        class="form-control @error('meta_keywords') is-invalid @enderror" maxlength="500"
                        placeholder="Comma-separated keywords">{{ old('meta_keywords', $page->meta_keywords) }}</textarea>
                    <small class="text-muted">Comma-separated keywords for SEO.</small>
                    @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check me-1"></i>
                        Update SEO
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
