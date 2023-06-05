@extends('layouts.header-footer')

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center flex-column py-5" id="contenitore"
         style="background-image: url('{{asset('images/doge-to-the-moon-05.jpg')}}');">

        @if(request()->path() === 'home' | request()->path() === '/')
            <div class="container-fluid align-items-center text-center mb-5 pt-4"
                 style="background-color: rgba(255, 255, 255, 0.7); max-width: 85%;">
                @yield('carosello')
            </div>
        @endif
        <div class="align-items-center text-center p-5"
             style="background-color: rgba(255, 255, 255, 0.7); max-width: 60%;">
            @yield('contenuto')
        </div>
    </div>
@endsection

