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
        <div style="padding: 50px">
            <div>
                <strong>numero totale coupone emessi: </strong>
            </div>
            <div style="margin-top: 10px"></div>
                <strong>lista coupon</strong>
                <table>
                    <tbody>
                    <tr>
                        <td>Promozione 1</td>
                        <td>
                            <button name="vediprom1" id="vediprom1">vedi numero coupon</button>
                        </td>

                    </tr>
                    <tr>
                        <td>Promozione 2</td>
                        <td>
                            <button name="vediprom2" id="vediprom2">vedi numero coupon</button>
                        </td>

                    </tr>
                    <tr>
                        <td>Promozione 3</td>
                        <td>
                            <button name="vediprom3" id="vediprom3">vedi numero coupon</button>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div style="padding: 50px">
        <div>
            <strong>numero totale coupone emessi: </strong>
        </div>
        <div style="margin-top: 10px"></div>
        <strong>lista coupon</strong>
        <table>
            <tbody>
            <tr>
                <td>Cliente 1</td>
                <td>
                    <button name="vediprom1" id="vediprom1">vedi numero coupon</button>
                </td>

            </tr>
            <tr>
                <td>Cliente 2</td>
                <td>
                    <button name="vediprom2" id="vediprom2">vedi numero coupon</button>
                </td>

            </tr>
            <tr>
                <td>CLiente 3</td>
                <td>
                    <button name="vediprom3" id="vediprom3">vedi numero coupon</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    </body>

@endsection

</html>
