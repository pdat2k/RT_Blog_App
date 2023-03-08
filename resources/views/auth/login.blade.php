@extends('auth.app')

@section('title','Login')

@section('name','Sign in')

@section('container')
    <form action="{{route('auth.login.account')}}" method="POST" autocomplete="off" >
        @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
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
                <input class="auth-group-check form-check-input" type="checkbox" name="rememberPassword" id="checkbox">
                <label class="auth-group-label form-check-label" for="checkbox" >Remember password</label>
            </div>
            <a class="auth-group-forgot" href="{{route('auth.forgot')}}">Forgot your password?</a>
        </div>
        <x-form.button>
            <x-slot name='button'>Login</x-slot>
            <x-slot name='href'>auth.user</x-slot>
            <x-slot name='link'>Don’t have an account? Sign up here</x-slot>
        </x-form.button>
    </form>
@endsection
