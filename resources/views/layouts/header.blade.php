<header class="header">
    <div class="header-container">
        <div class="content">
            <div class="header-nav d-flex justify-content-between align-items-center">
                @include('layouts.nav')
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="header-menu-nav d-flex justify-content-between align-items-center">
            <button class="btn header-menu-icon-btn p-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <div class="header-menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>
            </button>
            <a class="header-menu-logo-icon d-flex justify-content-between align-items-center"
                href="{{ route('user.home') }}">
                <div class="header-menu-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="header-logo" class="header-menu-image-icon" />
                </div>
                <p class="header-logo-name-menu">{{ __('util.project') }}</p>
            </a>
            <div class="header-nav-search">
                <form action="{{ route('user.home') }}" method="get">
                    <input type="text" class="header-search" placeholder="Search blog" name="search"
                        autocomplete="off" value="{{ $search ?? '' }}" />
                    <input type="hidden" name="category_id" value="{{ $category_id ?? '' }}">
                    <button type="submit">
                        <div class="header-search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
            <div class="header-menu-search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-start w-75" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5>{{ auth()->user()->name ?? 'Menu' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <ul class="p-0">
        <li class="header-signin-menu-item">
            <a class="header-signin-menu-link" href="{{ route('user.create') }}">{{ __('util.createBlog') }}</a>
        </li>
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
