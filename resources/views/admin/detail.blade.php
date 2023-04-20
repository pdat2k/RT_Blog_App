@extends('admin.app')

@section('title', 'Detail user')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('util.detailUser') }}</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('util.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('util.detailUser') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content d-flex justify-content-center align-items-center mt-5 gap-5 bg-white p-5">
        <img class="detail-admin-img mb-3" src="{{ $user->avatar }}" alt="{{ $user->avatar }}"
            onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';">
        <table class="detail-admin-table">
            <tr class="detail-admin-row">
                <th class="w-50">{{ __('util.name1') }}</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr class="detail-admin-row">
                <th class="w-50">{{ __('util.email') }}</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr class="detail-admin-row">
                <th class="w-50">{{ __('util.role') }}</th>
                <td>{{ $user->role == 1 ? 'User' : 'Admin' }}</td>
            </tr>
            <tr class="detail-admin-row">
                <th class="w-50">{{ __('util.status') }}</th>
                <td>{{ $user->status == 1 ? 'No Active' : 'Active' }}</td>
            </tr>
            <tr class="detail-admin-row">
                <th class="w-50">{{ __('util.createdAt') }}</th>
                <td>{{ $user->Time }}</td>
            </tr>
        </table>
    </section>
@endsection
