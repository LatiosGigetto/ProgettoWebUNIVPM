<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

@extends('contenitore')

<head>
    @section("title")
        riepilogo_acquisti
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
@section('contenuto')

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

</body>

@endsection
</html>
