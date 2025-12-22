@extends('dashboard.layouts.master')

@section('title', 'Edit Dahbia Cruise Page')

@push('css')
    <style>
        /* Dark style for Related Tours select (Select2) */
        .select2-container--default .select2-selection--multiple {
            background-color: #252836;
            border: 1px solid #3a3d4a;
            color: #e4e6eb;
            min-height: 42px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 4px 8px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: linear-gradient(135deg, #3a3d4a 0%, #4b4f5f 100%);
            border: none;
            color: #e4e6eb;
            border-radius: 999px;
            padding: 2px 10px;
            font-size: 0.8rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #ff8b8b;
            margin-right: 4px;
        }

        .select2-container--default .select2-selection--multiple:focus,
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .select2-container--default .select2-selection--multiple .select2-search__field {
            background-color: #252836 !important;
            color: #e4e6eb;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
            color: #8a8d94;
        }

        .select2-dropdown {
            background-color: #111827;
            border-color: #1f2937;
        }

        .select2-search--dropdown .select2-search__field {
            background-color: #111827;
            border: 1px solid #374151;
            color: #e5e7eb;
        }

        .select2-results__option {
            color: #e5e7eb;
            padding: 6px 10px;
            font-size: 0.9rem;
        }

        .select2-results__option[aria-selected="true"] {
            background-color: #065f46;
            color: #ecfdf5;
        }

        .select2-results__option--highlighted[aria-selected="false"] {
            background-color: #1f2937;
            color: #f9fafb;
        }

        .select2-results__option[aria-disabled="true"] {
            color: #6b7280;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            color: #ff8b8b;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Dahbia Cruise Page</h5>
            <a href="{{ route('admin.cruise-experiences.index') }}" class="btn btn-label-secondary">
                <i class="ti ti-arrow-left me-1"></i>
                Back
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cruise-experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $experience->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug', $experience->slug) }}"
                                   placeholder="Auto-generated from title if left empty">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description" id="short_description" rows="3"
                                      class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $experience->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Program Content</label>
                            <textarea name="description" id="description" rows="6"
                                      class="form-control @error('description') is-invalid @enderror summernote">{{ old('description', $experience->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($experience->images->count())
                            <div class="mb-3">
                                <label class="form-label">Existing Images</label>
                                <div class="row g-3">
                                    @foreach($experience->images as $image)
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="position-relative experience-image-wrapper">
                                                <img src="{{ asset('uploads/cruise-experiences/' . $image->image) }}"
                                                     alt="Image {{ $loop->iteration }}"
                                                     class="img-thumbnail mb-2 w-100"
                                                     style="max-height: 140px; object-fit: cover;">
                                                <button type="button"
                                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                        onclick="markExperienceImageForDeletion({{ $image->id }}, this);">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                            <div class="form-check text-center">
                                                <input class="form-check-input" type="checkbox"
                                                       name="deleted_images[]" value="{{ $image->id }}"
                                                       id="del-img-{{ $image->id }}" style="display:none;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <small class="text-muted d-block mt-1">Click the trash icon to mark an image for deletion, then save.</small>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Add New Images</label>
                            <input type="file" id="experience_new_images_input" name="images[]" class="form-control @error('images.*') is-invalid @enderror" multiple
                                   accept="image/*">
                            <small class="text-muted">You can add more images to the gallery.</small>
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="experienceNewImagesPreview" class="row g-2 mt-2"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror" required>
                                <option value="active" {{ old('status', $experience->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $experience->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order"
                                   class="form-control @error('sort_order') is-invalid @enderror"
                                   value="{{ old('sort_order', $experience->sort_order) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Related Tours</label>
                            <select name="tour_ids[]" id="related_tours_select" class="form-select" multiple>
                                @foreach($tours as $tour)
                                    <option value="{{ $tour->id }}"
                                        {{ in_array($tour->id, old('tour_ids', $selectedTourIds)) ? 'selected' : '' }}>
                                        {{ $tour->title }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted d-block mt-1">
                                Select tours that are related to this cruise program. You can search and select multiple tours.
                            </small>
                            @error('tour_ids.*')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"
                                   class="form-control @error('meta_title') is-invalid @enderror"
                                   value="{{ old('meta_title', $experience->meta_title) }}" maxlength="60">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                      class="form-control @error('meta_description') is-invalid @enderror"
                                      maxlength="160">{{ old('meta_description', $experience->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords"
                                   class="form-control @error('meta_keywords') is-invalid @enderror"
                                   value="{{ old('meta_keywords', $experience->meta_keywords) }}" placeholder="keyword1, keyword2">
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('admin.cruise-experiences.index') }}" class="btn btn-label-secondary">
                        <i class="ti ti-x me-1"></i>
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check me-1"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            if (typeof $.fn.summernote !== 'undefined') {
                $('.summernote').summernote({
                    height: 300,
                    tooltip: false,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    placeholder: 'Write full program details here...',
                    tabsize: 2,
                    dialogsInBody: true
                });
            }

            // Enhance related tours multi select
            if (typeof $.fn.select2 !== 'undefined') {
                $('#related_tours_select').select2({
                    placeholder: 'Search and select related tours',
                    allowClear: true,
                    width: '100%'
                });
            }

            // Preview newly selected gallery images
            const newImagesInput = document.getElementById('experience_new_images_input');
            const newImagesPreview = document.getElementById('experienceNewImagesPreview');

            if (newImagesInput && newImagesPreview) {
                newImagesInput.addEventListener('change', function (e) {
                    newImagesPreview.innerHTML = '';
                    const files = Array.from(e.target.files || []);

                    if (!files.length) return;

                    files.forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function (ev) {
                            const col = document.createElement('div');
                            col.className = 'col-4 col-md-3';
                            col.innerHTML = `
                                <div class="border rounded" style="overflow:hidden;">
                                    <img src="${ev.target.result}" alt="Preview"
                                         class="img-fluid" style="height:100px;object-fit:cover;width:100%;">
                                </div>
                            `;
                            newImagesPreview.appendChild(col);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            }

            // Helper to confirm delete of existing image (no extra form inside update form)
            window.markExperienceImageForDeletion = function (imageId, btn) {
                if (!confirm('Are you sure you want to delete this image? It will be removed after saving changes.')) {
                    return;
                }

                const checkbox = document.getElementById('del-img-' + imageId);
                if (checkbox) {
                    checkbox.checked = true;
                }

                const wrapper = btn.closest('.experience-image-wrapper');
                if (wrapper) {
                    wrapper.style.opacity = '0.4';
                    wrapper.style.filter = 'grayscale(0.7)';
                }

                // Disable and hide delete button so it can't be clicked again
                btn.disabled = true;
                btn.style.pointerEvents = 'none';
                btn.style.opacity = '0';
            };
        });
    </script>
@endpush
