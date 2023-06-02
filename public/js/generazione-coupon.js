$(document).ready(function () {

    $('#generacoupon').on('click', function (event) {

        event.preventDefault();

        let idOff = $(this).attr('name');

        $.ajax({
            url: "./acquisto/" + idOff,
            method: 'GET',
            dataType: 'json',
            success: function (response) {

                // Controlla se l'utente può effettivamente generare il coupon

                switch (response) {

                    case("utente-non-aut"):
                        $('#risultato').text("Non puoi generare coupon con account Staff o Amministratore!").css(
                                {
                                    display: 'inline',
                                    color: 'red'
                                }
                        );
                        break;
                    case("offerta-posseduta"):
                        $('#risultato').text("Hai già un coupon per quest'offerta!").css(
                                {
                                    display: 'inline',
                                    color: 'red'
                                }
                        );
                        break;
                    default:
                        $('#risultato').text("Codice coupon: " + response).css(
                                {
                                    display: 'inline',
                                    color: 'green'
                                }
                        );
                        $('#link-stampa').attr('name', response).css('display', 'block');
                }
            },
            error: function (xhr, status, error) {
                $('#risultato').text("Qualcosa è andato storto, riprova").css(
                        {
                            color: 'red',
                            display: 'inline'
                        });
            }
        });
    });
});
