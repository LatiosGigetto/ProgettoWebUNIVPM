
$(document).ready(function () {

    // Eliminazione utente con richiesta di conferma

    $('.el-utente').on('click', function () {

        if (confirm("Sei sicuro di voler eliminare questo utente?")) {

            let userUtente = $(this).attr('name');

            window.location.href = '/eliminazione-utenti/' + userUtente;
        }
    });

});  