$(document).ready(function () {

    // Eliminazione azienda con richiesta di conferma

    $('.elim-az').on('click', function () {

        if (confirm("Sei sicuro di voler eliminare quest'azienda?")) {

            let idAzienda = $(this).attr('name');

            window.location.href = './gestione-aziende/elim/' + idAzienda;
        }
    });

});
