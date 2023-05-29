
$(document).ready(function () {

    // Eliminazione utente con richiesta di conferma

    $('.el-staff').on('click', function () {

        if (confirm("Sei sicuro di voler eliminare questo membro dello Staff?")) {

            let userStaff = $(this).attr('name');

            window.location.href = '/gestione-membristaff/elim/' + userStaff;
        }
    });

});  
