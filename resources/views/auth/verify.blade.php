@extends('auth.app')

@section('title', 'Verfify Mail')

@section('name', 'Verfify Mail')

@section('container')
    <div class="auth-group-submit d-flex align-items-center  flex-column">
        <a href="{{ route('user.verify', ['token_verify' => $tokenVerify, 'time_create' => $timeCreate]) }}"
            class="auth-group-btn btn btn-primary mb-3">{{ __('util.verifyEmail') }}</a>
    </div>
@endsection
