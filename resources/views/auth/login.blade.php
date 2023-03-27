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
            <x-slot name='label'>Username or email</x-slot>
            <x-slot name='type'>text</x-slot>
            <x-slot name='input'>name</x-slot>
        </x-form.input>
        <x-form.input>
            <x-slot name='label'>Password</x-slot>
            <x-slot name='type'>password</x-slot>
            <x-slot name='input'>password</x-slot>
        </x-form.input>
        <div class="auth-group-bottom d-flex justify-content-between align-items-baseline">
            <div class="auth-group-checkbox form-check">
                <input class="auth-group-check form-check-input" type="checkbox" name="remember_password" id="checkbox"
                    {{ old('remember_password') || (isset($login) && $login->remember_token) ? 'checked' : '' }}>
                <label class="auth-group-label form-check-label" for="checkbox">Remember password</label>
            </div>
            <a class="auth-group-forgot" href="{{ route('user.forgot') }}">Forgot your password?</a>
        </div>
        <x-form.button>
            <x-slot name='button'>Login</x-slot>
            <x-slot name='href'>user.register</x-slot>
            <x-slot name='link'>Don’t have an account? Sign up here</x-slot>
        </x-form.button>
    </form>
@endsection
