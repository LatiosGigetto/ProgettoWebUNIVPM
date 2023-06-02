<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/qrcode.min.js') }}"></script>
    <script src="{{asset('js/stampa.js')}}"></script>
</head>

<body>
<div class="container d-flex flex-column vh-100 justify-content-center align-items-center">
    <h1>{{$coupon->getOffertaByCoupon()->getNomeAzienda()}}</h1>
    <br>
    <h2>{{ $coupon->getOffertaByCoupon()->Luogo }}</h2>
    <br>
    <h2>{{ $coupon->getOffertaByCoupon()->Validità }}</h2>
    <br>
    <h2>{{ $coupon->getOffertaByCoupon()->Oggetto }}</h2>
    <br>
    <h2 style="text-align: center">{{ $coupon->getOffertaByCoupon()->Descrizione }}</h2>
    <br>
    <br>
    <br>
    <h2>{{ $coupon->Id_Coupon }}</h2>



</div>
</body>
</html>

