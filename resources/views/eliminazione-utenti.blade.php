
@extends('header-footer')

    @section("title")
        Registrazione
    @endsection

@section('content')

    <div class="container text-center" style="justify-content: start; padding: 100px">
      <h1>Eliminazione Utente</h1>
      <table>
          <thead>
            <th>Nome Utente</th>
            <th>Eliminazione Utente</th>
           </thead>
          <tbody>
            <tr>
                <td>Utente 1</td>
                <td>
                    <button name="eliminautente1" id="eliminautente1">Elimina Utente</button>
                </td>
            </tr>
            <tr>
                <td>Utente 2</td>
                <td>
                    <button name="eliminautente2" id="eliminautente2">Elimina Utente</button>
                </td>

            </tr>
          </tbody>

      </table>
    </div>

@endsection

