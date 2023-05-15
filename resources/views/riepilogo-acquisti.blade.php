<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

@extends('header-footer')

<head>
    @section("title")
        riepilogo_acquisti
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
            .h2{
                text-align: center;
            }

    </style>

</head>

<body>
@section('content')

    <div class="riquadro2" style="flex-direction: column">
        <h2 style="text-align: center">Riepilogo acquisti</h2>
        <div class="lista_acquisti " style="border:1px solid">

            <!--la tabella deve cambiare dinamicamente in base all'utente loggato-->
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

    </div>

</body>

@endsection
</html>
