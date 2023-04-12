@extends('admin.app')

@section('title', 'Detail user')

@section('content')
    <section class="section-admin">
        <div class="content">
            <div class="aside-breadcrumb">
                {{ __('util.home') }} > <span class="aside-breadcrumb-title">{{ __('util.userDetail') }}</span>
            </div>
            <div class="section-infomation auth">
                <img src="{{ asset('images/user.png') }}" alt="" class="section-infomation-image">
                <h1 class="section--infomation-name d-flex justify-content-center">{{ $user->name }}</h1>
                <p class="section-infomation-email d-flex justify-content-center">{{ $user->email }}</p>
                <p>{{ $user->role }}</p>
                <p>{{ $user->status }}</p>
                <p>{{ $user->createdAt }}</p>
            </div>
        </div>
    </section>
@endsection
