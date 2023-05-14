<!DOCTYPE html>
<html lang="en">
<head>
    @extends('header-footer')
    <meta charset="UTF-8">
    @section('title')
        Le FAQ
    @endsection
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
@section('content')
    <div class="faq">
        <!-- Lo stile del form è da ripensare -->
        <form action="" style="margin: 10px;">
            <div style="display: flex">
                <label style="min-width: fit-content; margin-right: 5px">Domanda 1</label>
                <input style="width: 100%;">
            </div>
            <br><br>
            <div style="display: flex">
                <label style="vertical-align: top; min-width: fit-content; margin-right: 5px">Risposta 1</label>
                <input  style="height: 30vh; width: 100%">
            </div>
        </form>

    </div>
</body>
@endsection
</html>
