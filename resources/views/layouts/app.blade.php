@extends('layouts.base')
@section('body')
    @include('livewire.components.navbar')
    <div>
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
