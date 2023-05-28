@extends('layouts.header-footer')

@section('title')
    Home
@endsection

@section('link-scripts')
    @parent
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <!-- la riga seguente è quella che mi setta la larghezza del contenitore usando la classe col md che te li setta sui dispositivi medio-grandi -->
            <div class="col-md-5 col-lg-8 mb-4" style="background-image: url('{{asset("images/doge-to-the-moon-05.jpg")}}'); background-size: cover; background-position: center top;"> <!-- Aggiungi l'immagine di sfondo al riquadro -->
                <div class="card" style="background-color: transparent;">
                    <div class="card-body" style="background-color: rgba(255, 255, 255, 0.7);">
                        <h2 class="card-title">Contenuto centrale</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            La sezione 1.10.32 del "de Finibus Bonorum et Malorum", scritto da Cicerone nel 45 AC

                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection

