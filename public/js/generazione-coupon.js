$(document).ready(function () {

    // Generazione coupon con chiamata AJAX

    $('#generacoupon').on('click', function (event) {

        event.preventDefault();

        let idOff = $(this).attr('name');

        $.ajax({
            url: "./acquisto/" + idOff,
            method: 'GET',
            dataType: 'json',
            success: function (response) {

                // Controlla se l'utente può effettivamente generare il coupon.
                // Il controller restituisce una stringa JSON encoded in base al risultato.

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
                        $('#risultato').html("Hai generato il coupon con successo!<br>Il suo codice è: " + response).css(
                                {
                                    display: 'inline',
                                    color: 'green',
                                    marginTop: '20px'
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
