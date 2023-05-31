@extends('layouts.header-footer')

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="background-image: url('{{asset('images/doge-to-the-moon-05.jpg')}}'); background-size: cover; background-position: center; min-height: 100vh;">

        @if(request()->path() === 'home')
        <div class="container align-items-center text-center mb-5" style="background-color: rgba(255, 255, 255, 0.7);">
            @yield('carosello')
        </div>
        @endif
        <div class="align-items-center text-center p-5" style="background-color: rgba(255, 255, 255, 0.7); max-width: 50%">
            @yield('contenuto')
        </div>

    </div>
@endsection

