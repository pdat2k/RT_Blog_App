@extends('admin.app')

@section('title', 'Detail user')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('util.editUser')}}</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('util.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('util.editUser')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content ">
        <form action="{{ route('admin.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="grid">
                    <div class="form-group a">
                        <label for="name">{{ __('util.name1') }}</label>
                        <input id="name" name='name' type="text" value="{{ $user->name }}">
                    </div>
                    <div class="form-group b">
                        <label for="role">{{ __('util.role') }}</label>
                        <select name='role' class="h-100 form-role form-select bg-white">
                            <option value="" selected hidden>{{ __('util.role') }}</option>
                            @foreach ($roles as $key => $value)
                                <option value="{{ $value }}"
                                    @if ($value == $user->role) {{ 'selected' }} @endif>{{ $key }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group email-group">
                        <label for="email">{{ __('util.email') }}</label>
                        <input id="email" type="text" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group phone-group">
                        <label for="status">{{ __('util.status') }}</label>
                        <select name='status' class="h-100 form-role form-select bg-white">
                            <option value="" selected hidden>{{ __('util.role') }}</option>
                            @foreach ($status as $key => $value)
                                <option value="{{ $value }}"
                                    @if ($value == $user->status) {{ 'selected' }} @endif>{{ $key }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="textarea-group">
                        <label for="image1" class="w-100 h-100">
                            <img class="mt-4 avatar-image-edit" src="{{ $user->avatar }}" alt="{{ $user->avatar }}"
                                onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';">
                        </label>
                        <input type="file" class="form-control aside-form-file avatar-user-file" id="image1"
                            name='avatar' />
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('util.password') }}</label>
                        <input id="password" type="text" name="password">
                    </div>
                </div>
                <div class="button-container">
                    <button class="button" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </section>
@endsection
