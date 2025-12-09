<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route(auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access') ? 'admin.dashboard' : 'welcome') }}"
            class="app-brand-link fs-4">
            Travel Website
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.dashboard'], 'active open') }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Home">Home</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('categories.view') || auth()->user()->hasPermission('sub-categories.view'))
            <li
                class="menu-item {{ \App\Helpers\setSidebarActive(['admin.categories.*', 'admin.sub-categories.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-category"></i>
                    <div data-i18n="Categories">Categories</div>
                </a>
                <ul class="menu-sub">
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('categories.view'))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.categories.*'], 'active') }}">
                            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-category"></i>
                                <div data-i18n="Categories">Categories</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('sub-categories.view'))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.sub-categories.*'], 'active') }}">
                            <a href="{{ route('admin.sub-categories.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-category-2"></i>
                                <div data-i18n="Sub Categories">Sub Categories</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li
                class="menu-item {{ \App\Helpers\setSidebarActive(['admin.tours.*', 'admin.countries.*', 'admin.states.*', 'admin.tour-variants.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-plane"></i>
                    <div data-i18n="Tours">Tours</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.tours.*'], 'active') }}">
                        <a href="{{ route('admin.tours.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-plane"></i>
                            <div data-i18n="Tours">Tours</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.countries.*'], 'active') }}">
                        <a href="{{ route('admin.countries.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-world"></i>
                            <div data-i18n="Countries">Countries</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.states.*'], 'active') }}">
                        <a href="{{ route('admin.states.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-map-pin"></i>
                            <div data-i18n="States">States</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.tour-variants.*'], 'active') }}">
                        <a href="{{ route('admin.tour-variants.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-box"></i>
                            <div data-i18n="Tour Variants">Tour Variants</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('users.manage') || auth()->user()->hasPermission('roles.manage'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.users.*', 'admin.roles.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-shield-lock"></i>
                    <div data-i18n="Users & Roles">Users & Roles</div>
                </a>
                <ul class="menu-sub">
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('users.manage'))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.users.*'], 'active') }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-users"></i>
                                <div data-i18n="Users">Users</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('roles.manage'))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.roles.*'], 'active') }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-shield"></i>
                                <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.contacts.*'], 'active') }}">
                <a href="{{ route('admin.contacts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Contacts">Contacts</div>
                    @if(isset($unreadContactsCount) && $unreadContactsCount > 0)
                        <span class="badge rounded-pill bg-label-danger ms-auto">{{ $unreadContactsCount }}</span>
                    @endif
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.subscribers.*'], 'active') }}">
                <a href="{{ route('admin.subscribers.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Subscribers">Subscribers</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.sliders.*'], 'active') }}">
                <a href="{{ route('admin.sliders.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-photo"></i>
                    <div data-i18n="Sliders">Sliders</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.testimonials.*'], 'active') }}">
                <a href="{{ route('admin.testimonials.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-message-circle"></i>
                    <div data-i18n="Testimonials">Testimonials</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.faqs.*'], 'active') }}">
                <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div data-i18n="FAQs">FAQs</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission('dashboard.access'))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['admin.blogs.*'], 'active') }}">
                <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-news"></i>
                    <div data-i18n="Blogs">Blogs</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
