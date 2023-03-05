@extends('layouts.app')

@section('content')
    <div class="content">
       <section class="auth">
            <div class="auth-header d-flex align-items-center justify-content-center">
                <div class="auth-header-logo">
                    <img class="auth-header-img" src="{{asset('images/logo.png')}}" alt="auth-header-logo">
                </div>
                <span class="auth-header-name">RT-Blogs</span>
            </div>
            <h3 class="auth-signIn mb-3">@yield('name')</h3>
            @yield('container')
       </section>
    </div>
@endsection
