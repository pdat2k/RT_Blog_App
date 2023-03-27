@extends('auth.app')

@section('title', 'Register')

@section('name', 'Sign up')

@section('container')
    <form action="{{ route((string) $route) }}" method="POST" autocomplete="off">
        @csrf
        @php
            $forms = [['label' => 'Username', 'type' => 'text', 'input' => 'name'], ['label' => 'Email', 'type' => 'email', 'input' => 'email'], ['label' => 'Password', 'type' => 'password', 'input' => 'password'], ['label' => 'Password confirm', 'type' => 'password', 'input' => 'password_confirmation']];
        @endphp

        @foreach ($forms as $form)
            <x-form.input>
                <x-slot name='label'>{{ $form['label'] }}</x-slot>
                <x-slot name='type'>{{ $form['type'] }}</x-slot>
                <x-slot name='input'>{{ $form['input'] }}</x-slot>
            </x-form.input>
        @endforeach

        <x-form.button>
            <x-slot name='button'>Sign up</x-slot>
            <x-slot name='href'>user.login</x-slot>
            <x-slot name='link'>Already have an account? Login</x-slot>
        </x-form.button>
    </form>
@endsection
