
@extends('header-footer')

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
            <tr>
                <td>
                    <img style="width: 20%" src="images/logosito.png" alt="Descrizione dell'immagine">
                </td>
                <td>
                    <a href="Coupon1">Coupon1</a>
                </td>
            </tr>
            <tr>
                <td>
                    <img style="width: 20%" src="images/logosito.png" alt="Descrizione dell'immagine">
                </td>
                <td>
                    <a href="Coupon1">Coupon1</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

