$(document).ready(function () {

    // Controllo la validità delle promozioni e mando un alert se ce n'è almeno
    // una scaduta.

    // Per comparare la data salvata nel DB devo tagliare il risultato di
    // toISOString() dato che non c'è un semplice YYYY-MM-DD a quanto pare

    let dataOdierna = new Date().toISOString().split('T')[0];

    $('.valOff').each(function () {

        if ($(this).text() < dataOdierna) {

            return alert("Una o più delle tue offerte è scaduta. Rimuovila o aggiorna la validità.")
        }

    });

    // Eliminazione offerta con richiesta di conferma

    $('.el-prom').on('click', function () {

        if (confirm("Sei sicuro di voler eliminare quest'offerta?")) {

            let idOff = $(this).attr('name');

            window.location.href = './gestione-promozioni/elim/' + idOff;
        }
    });

});
