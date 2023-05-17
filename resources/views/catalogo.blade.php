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
    <h1>Catalogo Offerte</h1>

      <div class="container text-center">
          <div class="row">
              <div class="col">
                  <div class="card" style="width: 10rem;">
                      <img src="images/xampp_logo.png" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Offerta 1</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Genera coupon</a>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 10rem;">
                      <img src="images/xampp_logo.png" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Offerta 2</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Genera coupon</a>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 10rem;">
                      <img src="images/xampp_logo.png" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Offerta 3</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Genera coupon</a>
                      </div>
                  </div>
              </div>
      </div>

  </div>
  </div>

















</body>
@endsection

</html>
