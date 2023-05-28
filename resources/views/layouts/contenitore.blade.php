@extends('layouts.header-footer')

@section('content')
    <div class="container mt-3 ">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12 mb-4" style="background-image: url('{{asset('images/doge-to-the-moon-05.jpg')}}'); background-size: cover; background-position: center top;">
                <div class="card" style="background-color: transparent;">
                    <div class="card-body" style="background-color: rgba(255, 255, 255, 0.7);">
                        @yield('contenuto')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

