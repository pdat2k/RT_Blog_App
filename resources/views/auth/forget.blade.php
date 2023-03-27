@extends('auth.app')

@section('title', 'Forgot')

@section('name', 'Forgot')

@section('container')
    <form action="{{ route('user.forgot.verify') }}" method="POST" autocomplete="off">
        @csrf
        <x-form.input>
            <x-slot name='label'>Email</x-slot>
            <x-slot name='type'>email</x-slot>
            <x-slot name='input'>email</x-slot>
        </x-form.input>
        <x-form.button>
            <x-slot name='button'>Send</x-slot>
            <x-slot name='href'>user.login</x-slot>
            <x-slot name='link'>Already have an account? Login</x-slot>
        </x-form.button>
    </form>
@endsection
