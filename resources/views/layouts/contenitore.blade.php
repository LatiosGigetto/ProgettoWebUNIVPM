@extends('layouts.header-footer')

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center" style="background-image: url('{{asset('images/doge-to-the-moon-05.jpg')}}'); background-size: cover; background-position: center; min-height: 100vh;">

            <div class="container-lg  align-items-center text-center" style="background-color: rgba(255, 255, 255, 0.7);">
                @yield('contenuto')
            </div>

    </div>
@endsection

