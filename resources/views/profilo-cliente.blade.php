<!DOCTYPE html>
<html lang="en">
<head>
@extends('header-footer')
    <meta charset="UTF-8">
    @section('title')
        Ciao, Cliente!
    @endsection
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
@section('content')
    <div class="profilo">
        <h2>Area riservata Utente (cliente)</h2>
        <a href="">Cambia password</a>
        <br>
        <a href="">Coupon generati</a>
        <br>
        <a href="">Modifica informazioni personali</a>
    </div>
</body>
@endsection
</html>
