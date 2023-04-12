@extends('auth.app')

@section('title', 'Verfify Mail')

@section('name', 'Verfify Mail')

@section('container')
    <form action="{{ route('user.resend.verify') }}" method="POST" autocomplete="off">
        @csrf
        <div class="auth-group-input form-group">
            <label class="auth-group-label d-block form-label" for="email">{{ __('util.email') }}
                <span class="text-danger">*</span>
            </label>
            <input class="auth-group-text d-block w-100 form-control" id='email' type="email" name='email'
                value="{{ $email }}" />
        </div>

        <div class="auth-group-submit d-flex align-items-center flex-column">
            <input class="auth-group-btn btn btn-primary mb-3" type="submit" value="Resend Email" />
        </div>
    </form>
@endsection
