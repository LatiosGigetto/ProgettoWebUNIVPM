
@extends('layouts.header-footer')

@section("title")
    Riepilogo acquisti
@endsection

@section("link-scripts")
    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    <script src="{{asset('js/stampa.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Riepilogo acquisti</h1>

        @if($coupons->isNotEmpty())
            <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Logo Azienda</th>
                        <th>Azienda</th>
                        <th>ID Coupon</th>
                        <th>Descrizione offerta</th>
                        <th>Stampa Coupon</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr>
                            <td>
                                <img class="img-thumbnail" style="width: 100px; height: 100px" src="data:image/png/jpeg;base64,{{ base64_encode($coupon->getOffertaByCoupon()->getLogoAzienda())}}" alt="Logo azienda">
                            </td>
                            <td class="text-center align-middle">
                                <p>{{$coupon->getOffertaByCoupon()->getNomeAzienda()}} </p>
                            </td>
                            <td class="text-center align-middle">
                                <p>{{$coupon->Id_Coupon}} </p>
                            </td>
                            <td class="text-center align-middle">
                                <p>{{$coupon->getOffertaByCoupon()->Oggetto}}</p>
                            </td>
                            <td class="text-center align-middle">
                                    <button onclick="stampaPaginaProfilo(this.name)" class="btn btn-primary" name="{{$coupon->Id_Coupon}}">Stampa</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="min-vh-25 d-flex justify-content-center align-items-center">
                <h1> Non hai ancora generato alcun coupon a tuo nome</h1>
            </div>
        @endif

        @include('layouts/tornaindietro')

    </div>
@endsection
