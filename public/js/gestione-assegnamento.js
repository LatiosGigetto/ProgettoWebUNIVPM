
$(document).ready(function () {

    // Eliminazione assegnamento con richiesta di conferma

    $('.elim-ass').on('click', function () {

        // Prende la riga del bottone e poi ricava il testo del primo
        // elemento di quella riga.

        let cellaNomeStaff = $(this).closest('tr').find('td:eq(1)');

        let nomeStaff = cellaNomeStaff.text();

        // Controlla se ci sono altri elementi con lo stesso nome.
        // Se ce n'è almeno uno, setta ultimo a false.

        let colonneNome = $('.nome-staff').not(cellaNomeStaff);
        let ultimo = true;

        colonneNome.each(function () {
         
            if ($(this).text() === nomeStaff) {
                
                ultimo = false;
            }

        });
       
       // L'eliminazione è permessa solo se ultimo è false.
       
        if (!ultimo) {
            
            if (confirm("Sei sicuro di voler eliminare questo assegnamento?")) {

                let userUtente = $(this).attr('name');

                window.location.href = '/gestione-assegnamento/elim/' + userUtente;
            }
        } else {

            alert("Non puoi eliminare l'ultima azienda assegnata a questo membro dello staff");

        }
    });

});  