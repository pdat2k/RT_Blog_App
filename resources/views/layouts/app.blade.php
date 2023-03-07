@extends('app')

@section('title', 'Home page')

@section('content')
    <div id="wrapper" class="wrapper">
        @include('layouts.header')
        @include('layouts.session')
        @include('layouts.footer')
    </div>
@endsection
