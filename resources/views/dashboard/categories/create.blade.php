@extends('dashboard.layouts.master')

@section('title', 'Create Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        value="{{ old('slug') }}" placeholder="Auto-generated from name if left empty">
                    <small class="text-muted">Leave empty to auto-generate from name, or enter custom slug</small>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                            accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                            required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order"
                            name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Page Style Settings --}}
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">Page Style Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="grid_columns" class="form-label">Grid Columns</label>
                                <select class="form-select @error('grid_columns') is-invalid @enderror" id="grid_columns"
                                    name="grid_columns">
                                    <option value="2" {{ old('grid_columns', '4') == '2' ? 'selected' : '' }}>2 Columns
                                    </option>
                                    <option value="3" {{ old('grid_columns', '4') == '3' ? 'selected' : '' }}>3 Columns
                                    </option>
                                    <option value="4" {{ old('grid_columns', '4') == '4' ? 'selected' : '' }}>4 Columns
                                    </option>
                                </select>
                                @error('grid_columns')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="header_background_color" class="form-label">Header Background Color</label>
                                <input type="color"
                                    class="form-control form-control-color @error('header_background_color') is-invalid @enderror"
                                    id="header_background_color" name="header_background_color"
                                    value="{{ old('header_background_color', '#ffffff') }}">
                                @error('header_background_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="header_text_color" class="form-label">Header Text Color</label>
                                <input type="color"
                                    class="form-control form-control-color @error('header_text_color') is-invalid @enderror"
                                    id="header_text_color" name="header_text_color"
                                    value="{{ old('header_text_color', '#000000') }}">
                                @error('header_text_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="card_style" class="form-label">Card Style</label>
                                <select class="form-select @error('card_style') is-invalid @enderror" id="card_style"
                                    name="card_style">
                                    <option value="default" {{ old('card_style', 'default') == 'default' ? 'selected' : '' }}>
                                        Default</option>
                                    <option value="modern" {{ old('card_style', 'default') == 'modern' ? 'selected' : '' }}>
                                        Modern</option>
                                    <option value="classic" {{ old('card_style', 'default') == 'classic' ? 'selected' : '' }}>
                                        Classic</option>
                                </select>
                                @error('card_style')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" id="show_breadcrumb"
                                        name="show_breadcrumb" {{ old('show_breadcrumb', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_breadcrumb">Show Breadcrumb</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" id="show_description"
                                        name="show_description" {{ old('show_description', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_description">Show Description</label>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="custom_css" class="form-label">Custom CSS</label>
                                <textarea class="form-control @error('custom_css') is-invalid @enderror" id="custom_css"
                                    name="custom_css" rows="6"
                                    placeholder="Enter custom CSS code here...">{{ old('custom_css') }}</textarea>
                                <small class="text-muted">Add custom CSS to style this category page</small>
                                @error('custom_css')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-label-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function () {
            const slugInput = document.getElementById('slug');
            if (!slugInput.value) {
                slugInput.value = this.value.toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
    </script>
@endpush