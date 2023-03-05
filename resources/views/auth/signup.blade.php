@extends('auth.app')

@section('title','Register')

@section('name','Sign up')

@section('container')
    <form action="" method="POST" autocomplete="off" >
        @csrf
        <x-form.input>
            <x-slot name='label'>Username</x-slot>
            <x-slot name='type'>text</x-slot>
            <x-slot name='input'>username</x-slot>
        </x-form.input>
        <x-form.input>
            <x-slot name='label'>Email</x-slot>
            <x-slot name='type'>email</x-slot>
            <x-slot name='input'>email</x-slot>
        </x-form.input>
        <x-form.input>
            <x-slot name='label'>Password</x-slot>
            <x-slot name='type'>password</x-slot>
            <x-slot name='input'>password</x-slot>
        </x-form.input>
        <x-form.input>
            <x-slot name='label'>Password confirm</x-slot>
            <x-slot name='type'>password</x-slot>
            <x-slot name='input'>passwordConfirm</x-slot>
        </x-form.input>

        <x-form.button>
            <x-slot name='button'>Sign up</x-slot>
            <x-slot name='href'>login</x-slot>
            <x-slot name='link'>Already have an account? Login</x-slot>
        </x-form.button>
    </form>
@endsection

