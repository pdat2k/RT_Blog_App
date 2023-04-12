<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="wrapper" class="wrapper">
        <div class="content">
            <section class="auth">
                <a class="auth-header d-flex align-items-center justify-content-center" href="{{ route('user.home') }}">
                    <div class="auth-header-logo">
                        <img class="auth-header-img" src="{{ asset('images/logo.png') }}" alt="auth-header-logo">
                    </div>
                    <span class="auth-header-name">{{ __('util.project') }}</span>
                </a>
                <h3 class="auth-signIn mb-3">@yield('name')</h3>
                @yield('container')
            </section>
        </div>
    </div>
</body>

</html>
