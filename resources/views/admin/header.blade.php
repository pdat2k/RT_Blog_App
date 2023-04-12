<header class="header-admin">
    <div class="content">
        <div class="header-nav d-flex justify-content-between align-items-center">
            <div class="header-nav-logo d-flex justify-content-between align-items-center">
                <a class="header-group-logo d-flex align-items-center" href="{{ route('admin.home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="header-logo" class="header-logo" />
                    <p class="header-logo-name">{{ __('util.project') }}</p>
                </a>
            </div>
            <div class="header-nav-button d-flex justify-content-between align-items-center">
                <div class="header-nav-top d-flex justify-content-between align-items-center">
                </div>
                <div class="header-signin d-flex justify-content-between align-items-center">
                    <p class="header-signin-name">{{ auth()->user()->name ?? 'myname' }}</p>
                    <div class="header-signin-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <ul class="header-signin-menu">
                        <li class="header-signin-menu-item">
                            <a href="" class="header-signin-menu-link">{{ __('util.account') }}</a>
                        </li>
                        <li class="header-signin-menu-item">
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <button class="header-signin-menu-link" type="submit">
                                    @if (auth()->check())
                                        {{ __('util.logout') }}
                                    @else
                                        {{ __('util.login') }}
                                    @endif
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>
