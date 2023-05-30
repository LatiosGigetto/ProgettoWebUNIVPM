@extends('layouts.header-footer')

@section("title")
Riepilogo acquisti
@endsection

    @section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">

    @endsection

@section('content')

<h1 style="text-align: center">Riepilogo acquisti</h2>

@if($coupons->isNotEmpty())

<div id="tabella_riepilgo" >



    <table>
        <thead>

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
                    <img style="height: 100px; width: 100px" 
                         src="data:image/png/jpeg;base64,{{ base64_encode($coupon->getOffertaByCoupon()->getLogoAzienda())}}" alt="Logo azienda">
                </td>
                <td>
                    <p>{{$coupon->getOffertaByCoupon()->getNomeAzienda()}} </p>
                </td>
                <td>
                    <p>{{$coupon->Id_Coupon}} </p>
                </td>
                <td>
                    <p>{{$coupon->getOffertaByCoupon()->Oggetto}}</p>
                </td>
                <td>
                    <button>Stampa</button>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


</div>

@else
<div style="min-height: 25vw; display:flex; justify-content: center; align-items: center">
    <h1> Non hai ancora generato alcun coupon a tuo nome</h1>
</div>
    @endif
@include('layouts/tornaindietro')
@endsection

