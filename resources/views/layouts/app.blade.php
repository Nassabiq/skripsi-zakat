@extends('layouts.base')
@section('body')
    @include('components.navbar')
    <div id="app">
        @yield('content')
    </div>
@endsection
