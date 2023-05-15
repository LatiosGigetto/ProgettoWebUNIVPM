<!DOCTYPE html>

<html lang="it">

@extends('header-footer')

<head>
    <meta charset="UTF-8">
    @section("title")
        Lista aziende
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aziende.css">
</head>

<body>
@section('content')
    <div style="min-height: 50vh">
        <div class="spazio_blocco">
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="titolo_azienda">Azienda 1</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="titolo_azienda">Azienda 2</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
            <div class="blocco_offerta">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="titolo_azienda">Azienda 3</h3>
                    <p class="paragraph">Dati azienda</p>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
