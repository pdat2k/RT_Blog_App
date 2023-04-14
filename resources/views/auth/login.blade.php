@extends('auth.app')

@section('title', 'Login')

@section('name', 'Sign in')

@section('container')
    <form action="{{ route('user.login.index') }}" method="POST" autocomplete="off">
        @csrf
        @if (session(__('util.success')))
            <div class="alert alert-success">
                {{ session(__('util.success')) }}
            </div>
        @endif
        @if (session(__('util.failed')))
            <div class="alert alert-danger">
                {{ session(__('util.failed')) }}
            </div>
        @endif
        <x-form.input>
            <x-slot name='label'>{{ __('util.userOrName') }}</x-slot>
            <x-slot name='type'>{{ __('util.text') }}</x-slot>
            <x-slot name='input'>{{ __('util.name') }}</x-slot>
        </x-form.input>
        <x-form.input>
            <x-slot name='label'>{{ __('util.password') }}</x-slot>
            <x-slot name='type'>{{ __('util.password1') }}</x-slot>
            <x-slot name='input'>{{ __('util.password1') }}</x-slot>
        </x-form.input>
        <div class="auth-group-bottom d-flex justify-content-between align-items-baseline">
            <div class="auth-group-checkbox form-check">
                <input class="auth-group-check form-check-input" type="checkbox" name="remember_password" id="checkbox"
                    checked>
                <label class="auth-group-label form-check-label" for="checkbox">{{ __('util.rememberPassword') }}</label>
            </div>
            <a class="auth-group-forgot" href="{{ route('user.forgot') }}">{{ __('util.textForgot') }}</a>
        </div>
        <x-form.button>
            <x-slot name='button'>{{ __('util.login1') }}</x-slot>
            <x-slot name='href'>{{ __('util.userRegister') }}</x-slot>
            <x-slot name='link'>{{ __('util.textRegister') }}</x-slot>
        </x-form.button>
    </form>
@endsection
