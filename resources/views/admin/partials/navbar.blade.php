<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="m-0 p-0 container-fluid">
        <button class="sidebar-toggle navbar-toggle--sidebar"
                id="sidebar-toggle">
            @include('components.icons.toggle')
        </button>

        <button class="navbar-toggler navbar-toggle--navbar"
                id="navbar-toggle"
                data-toggle="collapse"
                data-target="#navbar-content">
            @include('components.icons.toggle')
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav d-flex justify-content-end w-100">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-3" href="#" data-toggle="dropdown">
                        <b>{{ auth()->user()->email }}</b>
                    </a>
                    <form class="navbar-dropdown-menu dropdown-menu"
                          action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                        <button class="dropdown-item">
                            {{ __('logout') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
