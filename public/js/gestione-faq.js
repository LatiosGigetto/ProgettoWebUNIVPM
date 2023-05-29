
$(document).ready(function () {

    // Eliminazione utente con richiesta di conferma

    $('.el-faq').on('click', function () {

        if (confirm("Sei sicuro di voler eliminare questo utente?")) {

            let idFaq = $(this).attr('name');

            window.location.href = '/gestione-faq/elim/' + idFaq;
        }
    });

});  