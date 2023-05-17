@extends("header-footer")

@section("content")

<div>
    @foreach($aziende as $azienda)


    <div style="display: flex">

        <h1> Nome Azienda: {{ $azienda->NomeAzienda }} </h1>
        <h1> Descrizione:  {{ $azienda->Descrizione }} </h1>
    </div>
    @endforeach
</div>
@endsection
