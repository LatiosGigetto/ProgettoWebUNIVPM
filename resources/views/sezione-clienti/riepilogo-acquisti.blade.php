@extends('layouts.header-footer')

@section("title")
    Riepilogo acquisti
@endsection

@section('content')

    <h2 style="text-align: center">Riepilogo acquisti</h2>
    <div id="tabella_riepilgo">
        <!--la tabella deve cambiare dinamicamente in base all'utente loggato-->
        <!--questa è una prova fatta con due elementi fittizi-->
        <!--TODO da sistemare-->
        <table>
            <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>
                        <img style="width: 20%" src="images/logosito.png" alt="Descrizione dell'immagine">
                    </td>
                    <td>
                        <a>Coupon :{{$coupon->Id_Coupon}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection

