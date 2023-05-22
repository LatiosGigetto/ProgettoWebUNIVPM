<!DOCTYPE html>

<html lang="it">
@extends('header-footer')
<head>

    <meta charset="UTF-8">
    @section("title")
        Catalogo
    @endsection
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
@section("content")
  <div class="container mt-1" style="justify-content: start">
    <h1 class="text-center">Catalogo Offerte</h1>

      <div class="container text-center">
          <div class="row">
              @foreach($offerte as $offerta)
              <div class="col">
                  <div class="card" style="width: 18rem;">
                      <img src="images/xampp_logo.png" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">{{$offerta->Luogo}}</h5>
                          <p class="card-text">{{$offerta->Descrizione}}</p>
                          <a href="{{ route('dettagli-offerta', ['id' => $offerta-> Id_Offerta])}}" class="btn btn-primary">Vai all'aquisto</a>
                      </div>
                  </div>
              </div>
                  @endforeach
              
      </div>

  </div>
  </div>

















</body>
@endsection

</html>
