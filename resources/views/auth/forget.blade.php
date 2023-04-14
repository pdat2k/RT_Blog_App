@extends('auth.app')

@section('title', 'Forgot')

@section('name', 'Forgot')

@section('container')
    <form action="{{ route('user.forgot.verify') }}" method="POST" autocomplete="off">
        @csrf
        <x-form.input>
            <x-slot name='label'>{{ __('util.email') }}</x-slot>
            <x-slot name='type'>{{ __('util.email1s') }}</x-slot>
            <x-slot name='input'>{{ __('util.email1s') }}</x-slot>
        </x-form.input>
        <x-form.button>
            <x-slot name='button'>{{ __('util.send') }}</x-slot>
            <x-slot name='href'>{{ __('util.userLogin') }}</x-slot>
            <x-slot name='link'>{{ __('util.textLogin') }}</x-slot>
        </x-form.button>
    </form>
@endsection
