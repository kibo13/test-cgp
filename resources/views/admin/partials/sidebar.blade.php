<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a class="sidebar-logo__link" href="{{ route('admin.home') }}">
                <img class="sidebar-logo__icon"
                     src="{{ asset('assets/icons/logo.png') }}"
                     alt="{{ __('logotype') }}"
                     title="{{ __('Cabinet') }}">
                <span class="sidebar-logo__text">
                    {{ __('Cabinet') }}
                </span>
            </a>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list__item {{ is_active('admin.home', 'sidebar-list__item--active') }}">
            <a class="sidebar-list__link"
               href="{{ route('admin.home') }}"
               title="{{ __('Home') }}">
                {{ @fa('fa-home sidebar-list__icon') }}
                <span class="sidebar-list__text">
                    {{ __('Home') }}
                </span>
            </a>
        </li>
        <li class="sidebar-list__item {{ is_active('admin.companie*', 'sidebar-list__item--active') }}">
            <a class="sidebar-list__link"
               href="{{ route('admin.companies.index') }}"
               title="{{ __('Companies') }}">
                {{ @fa('fa-building-o sidebar-list__icon') }}
                <span class="sidebar-list__text">
                    {{ __('Companies') }}
                </span>
            </a>
        </li>
        <li class="sidebar-list__item {{ is_active('admin.client*', 'sidebar-list__item--active') }}">
            <a class="sidebar-list__link"
               href="{{ route('admin.clients.index') }}"
               title="{{ __('Clients') }}">
                {{ @fa('fa-user-o sidebar-list__icon') }}
                <span class="sidebar-list__text">
                    {{ __('Clients') }}
                </span>
            </a>
        </li>
    </ul>
</nav>
