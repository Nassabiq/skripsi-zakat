@extends('layouts.base')
@section('body')
    @include('components.navbar')
    <div>
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
