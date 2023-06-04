@extends('layouts.header-footer')

@section('title')
    Gestione FAQ
@endsection

@section("link-scripts")

    <script src="{{asset("js/gestione-faq.js")}}"></script>

@endsection

@section('content')

    <div class="container d-flex align-items-center h-100 py-4">
        @switch($azione)

            @case('view')
                <div class="container text-center">
                    <h1>Gestione FAQ</h1>
                    <table class="table table-bordered mx-auto">
                        <thead class="thead-dark">
                        <tr>
                            <th>Domanda</th>
                            <th>Modifica</th>
                            <th>Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faq as $Faq)
                            <tr>
                                <td>{{ $Faq->Domanda }}</td>
                                <td>
                                    <a href="{{ route('modifica-faq-view', ['id' => $Faq->Id_Domanda])}}">
                                        <button class="btn btn-primary">Modifica</button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger el-faq" name="{{ $Faq->Id_Domanda }}">Elimina</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{ route('crea-faq-view')}}">
                            <button class="btn btn-primary">Crea Nuova FAQ</button>
                        </a>
                    </div>
                    <div style="text-align: center">
                        @if(session('success'))
                            <strong style="color: green">{{ session('success') }}</strong>
                        @endif
                    </div>
                </div>
                @break

            @case('mod')
                <div class="container w-75 form_container my-2">
                    <h1 class="text-center">Modifica faq</h1>

                    <div id="mod-faq-sezione">
                        {{ Form::open(['route' => 'modifica-faq-conf']) }}
                        {{ Form::hidden('id_domanda', $faqSel->Id_Domanda) }}

                        <div class="form-group my-2">
                            {{ Form::label('domanda', 'Domanda') }}
                            {{ Form::text('domanda', $faqSel->Domanda, ['class' => 'form-control']) }}
                            @error('domanda')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('risposta', 'Risposta') }}
                            {{ Form::text('risposta', $faqSel->Risposta, ['class' => 'form-control']) }}
                            @error('risposta')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-faq') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>

                @break

            @case('create')
                <div class="container w-75 form_container my-2">
                    <h1 class="text-center">Crea nuova faq</h1>

                    <div id="mod-faq-sezione">
                        {{ Form::open(['route' => 'crea-faq-conf']) }}

                        <div class="form-group my-2">
                            {{ Form::label('domanda', 'Domanda') }}
                            {{ Form::text('domanda', '', ['class' => 'form-control']) }}
                            @error('domanda')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('risposta', 'Risposta') }}
                            {{ Form::text('risposta', '', ['class' => 'form-control']) }}
                            @error('risposta')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Crea', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-faq') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>

                @break
        @endswitch
    </div>

@endsection

