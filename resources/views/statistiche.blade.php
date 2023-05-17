<!DOCTYPE html>
<html lang="it">

<head>

    @extends('header-footer')

    <meta charset="UTF-8">
    @section("title")
        Statistiche
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabelle.css">



</head>

@section("content")

    <body>
    <!--
        <div class="spazio_barra_laterale">
            *spazio per la barra laterale*
        </div>
    -->

    <h1>Statistiche</h1>
    <div class="container" style="justify-content: start">
        <div id="marginestats"> <strong>numero totale coupone emessi: </strong></div>

        <div class="margine"><strong>lista coupon</strong></div>

        <div class="margine">
            <table>
                <tbody>
                <tr>
                    <td>Promozione 1</td>
                    <td>
                        <button name="vediprom1" id="vediprom1">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Promozione 2</td>
                    <td>
                        <button name="vediprom2" id="vediprom2">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Promozione 3</td>
                    <td>
                        <button name="vediprom3" id="vediprom3">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="margine"> <strong>lista clienti </strong></div>
        <div class="margine">
            <table>
                <tbody>
                <tr>
                    <td>CLiente 1</td>
                    <td>
                        <button name="vedicli1" id="vedicli1">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cliente 2</td>
                    <td>
                        <button name="vedicli2" id="vedicli2">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cliente 3</td>
                    <td>
                        <button name="vedicli3" id="vedicli3">vedi numero coupon</button>
                    </td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    </body>

@endsection

</html>
