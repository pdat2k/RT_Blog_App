@extends('admin.app')

@section('title', 'User list')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('util.userList') }}</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('util.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('util.userList') }}</li>
                    </ol>
                </div>
            </div>
            <div>
                <section class="section-admin">
                    <div>
                        <table class="table table-bordered table-hover bg-white">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col" class="text-center">{{ __('util.stt') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.id') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.name1') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.email') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.role') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.status') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.createdAt') }}</th>
                                    <th scope="col" class="text-center">{{ __('util.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr class="table-user-row-{{ $user->id }}">
                                        <td class="text-center" scope="row">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->role == 1 ? 'User' : 'Admin' }}</td>
                                        <td class="text-center">{{ $user->status == 1 ? 'No Active' : 'Active' }}</td>
                                        <td class="text-center">{{ $user->Time }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center gap-3">
                                                <a class="btn btn-success table-icon"
                                                    href="{{ route('admin.users.show', ['user' => $user->id]) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </a>
                                                <a class="btn btn-primary table-icon"
                                                    href="{{ route('admin.edit', ['user' => $user->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>

                                                </a>
                                                <button class="btn btn-danger modalDelete table-icon table-delete-user"
                                                    data-url="{{ route('admin.remove', ['user' => $user->id]) }}",
                                                    data-id="{{ $user->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <div class="modal fade deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title detail-content-title">{{ __('util.delete') }}</h5>
                                <button style="margin-right: -4px" type="button"
                                    class="close detail-comment-boxs-button modalDelete" data-dismiss="modal"
                                    aria-label="Close">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body text-center p-5">
                                {{ __('util.textDeleteUser') }}
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary modalDelete"
                                    data-dismiss="modal">{{ __('util.cancel') }}</button>
                                <button type="submit"
                                    class="btn btn-danger table-delete-userbtn">{{ __('util.delete') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
