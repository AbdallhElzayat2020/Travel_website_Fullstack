@extends('dashboard.layouts.master')

@section('title', 'Settings')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Website Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Navbar Settings --}}
                <div class="mb-4">
                    <h6 class="mb-3">Cruises Menu Settings</h6>

                    {{-- Main Menu Name --}}
                    <div class="mb-3">
                        <label for="main_cruises_menu_name" class="form-label">Main Cruises Menu Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('main_cruises_menu_name') is-invalid @enderror"
                            id="main_cruises_menu_name" name="main_cruises_menu_name"
                            value="{{ old('main_cruises_menu_name', $mainCruisesMenuName) }}" required>
                        <small class="text-muted">This name will appear as the main menu item (e.g., "Dahabiya & Cruises")</small>
                        @error('main_cruises_menu_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Group 1: Dahabiya Cruises --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Group 1: Dahabiya Cruises</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="cruise_group_1_name" class="form-label">Group 1 Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('cruise_group_1_name') is-invalid @enderror"
                                    id="cruise_group_1_name" name="cruise_group_1_name"
                                    value="{{ old('cruise_group_1_name', $group1Name) }}" required>
                                @error('cruise_group_1_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cruise_group_1_slug" class="form-label">Group 1 Slug</label>
                                <input type="text" class="form-control @error('cruise_group_1_slug') is-invalid @enderror"
                                    id="cruise_group_1_slug" name="cruise_group_1_slug"
                                    value="{{ old('cruise_group_1_slug', $group1Slug) }}">
                                <small class="text-muted">Leave empty to auto-generate from name. Current: <code>{{ $group1Slug }}</code></small>
                                @error('cruise_group_1_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Group 2: Ultra Deluxe Dahabiya --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Group 2: Ultra Deluxe Dahabiya</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="cruise_group_2_name" class="form-label">Group 2 Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('cruise_group_2_name') is-invalid @enderror"
                                    id="cruise_group_2_name" name="cruise_group_2_name"
                                    value="{{ old('cruise_group_2_name', $group2Name) }}" required>
                                @error('cruise_group_2_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cruise_group_2_slug" class="form-label">Group 2 Slug</label>
                                <input type="text" class="form-control @error('cruise_group_2_slug') is-invalid @enderror"
                                    id="cruise_group_2_slug" name="cruise_group_2_slug"
                                    value="{{ old('cruise_group_2_slug', $group2Slug) }}">
                                <small class="text-muted">Leave empty to auto-generate from name. Current: <code>{{ $group2Slug }}</code></small>
                                @error('cruise_group_2_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Group 3: Grand Nile Cruises --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Group 3: Grand Nile Cruises</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="cruise_group_3_name" class="form-label">Group 3 Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('cruise_group_3_name') is-invalid @enderror"
                                    id="cruise_group_3_name" name="cruise_group_3_name"
                                    value="{{ old('cruise_group_3_name', $group3Name) }}" required>
                                @error('cruise_group_3_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cruise_group_3_slug" class="form-label">Group 3 Slug</label>
                                <input type="text" class="form-control @error('cruise_group_3_slug') is-invalid @enderror"
                                    id="cruise_group_3_slug" name="cruise_group_3_slug"
                                    value="{{ old('cruise_group_3_slug', $group3Slug) }}">
                                <small class="text-muted">Leave empty to auto-generate from name. Current: <code>{{ $group3Slug }}</code></small>
                                @error('cruise_group_3_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="navbar_logo" class="form-label">Navbar Logo</label>
                        @if($navbarLogo)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/settings/' . $navbarLogo) }}" alt="Navbar Logo"
                                    style="max-width: 200px; max-height: 80px; border-radius: 4px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('navbar_logo') is-invalid @enderror" id="navbar_logo"
                            name="navbar_logo" accept="image/*">
                        <small class="text-muted">Leave empty to keep current logo. Recommended size: 200x60px</small>
                        @error('navbar_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                {{-- Contact Information --}}
                <div class="mb-4">
                    <h6 class="mb-3">Contact Information</h6>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                            value="{{ old('phone', $phone) }}" required>
                        <small class="text-muted">e.g., +20 101 515 7744 / +20 101 515 7746</small>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $email) }}" required>
                        <small class="text-muted">e.g., info@grandnilecruises.com</small>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                            rows="3" required>{{ old('address', $address) }}</textarea>
                        <small class="text-muted">Full address for footer</small>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                {{-- Footer Logo --}}
                <div class="mb-4">
                    <h6 class="mb-3">Footer Logo</h6>
                    <div class="mb-3">
                        <label for="footer_logo" class="form-label">Footer Logo</label>
                        @if($footerLogo)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/settings/' . $footerLogo) }}" alt="Footer Logo"
                                    style="max-width: 200px; max-height: 80px; border-radius: 4px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('footer_logo') is-invalid @enderror" id="footer_logo"
                            name="footer_logo" accept="image/*">
                        <small class="text-muted">Leave empty to keep current logo. Recommended size: 200x60px</small>
                        @error('footer_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-label-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
