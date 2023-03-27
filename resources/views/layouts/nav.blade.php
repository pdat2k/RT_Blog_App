<div class="header-nav-logo d-flex justify-content-between align-items-center">
    <a class="header-group-logo d-flex align-items-center" href="{{ route('user.home') }}">
        <img src="./images/logo.png" alt="header-logo" class="header-logo" />
        <p class="header-logo-name">RT-Blogs</p>
    </a>
    <div class="header-nav-search">
        <input type="text" class="header-search" placeholder="Search blog" />
        <div class="header-search-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </div>
    </div>
</div>
<div class="header-nav-button d-flex justify-content-between align-items-center">
    <div class="header-nav-top d-flex justify-content-between align-items-center">
        <a href="#" class="header-nav-link">Top</a>
        <a class="header-create-blog" href="{{ route('user.create') }}">Create Blog</a>
    </div>
    <div class="header-signin d-flex justify-content-between align-items-center">
        <p class="header-signin-name">myname</p>
        <div class="header-signin-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
    </div>
</div>
