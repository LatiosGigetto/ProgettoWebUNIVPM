<!DOCTYPE html>

<html lang="it">

@extends('header-footer')

<head>
    <meta charset="UTF-8">
    @section("title")
        Lista aziende
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <style>
        .imgage_logo{
            height: 100%;
            float: left;
            border: 1px solid red;
        }
        h3{
            text-align: center;
            border: 1px solid blue;
            align-self: start;
            float: left;
            margin-top: 0;
            width: 100%;
            margin-bottom: 0;
        }
        .paragraph{
            border: 1px solid violet;
            align-self: start;
            width: 100%;
            margin-top:0;
            height: 100%;
            margin-bottom: 0;
        }
    </style>

</head>
<body>
@section('content')
    <div style="min-height: 50vh">
        <div class="spazio_blocco">
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="imgage_logo">
                <div class="spazio_contenuto">
                    <h3>Azienda 1</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="imgage_logo">
                <div class="spazio_contenuto">
                    <h3>Azienda 2</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="imgage_logo">
                <div class="spazio_contenuto">
                    <h3>Azienda 3</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
