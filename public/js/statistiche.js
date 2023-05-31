
$(document).ready(function () {

    $('#num-coupon').on('click', function () {

        $.ajax({
            url: '/statistiche/couponTot',
            method: 'GET',
            dataType: 'json',
            success: function (response) {

                $('#coupon-tot').text("Coupon totali:" + response);
            },
            error: function (xhr, status, error) {
                $('#coupon-tot').text("Qualcosa è andato storto, riprova").css('color', 'red');
            }
        });
    });

    $('#coupon-off-form').on('submit', function (event) {

        let datiFormOfferta = $(this).serialize();
    
        event.preventDefault();
        
        let token = $(this).find('input[name="_token"]').val();

        $.ajax({
            url: "/statistiche/off",
            method: 'POST',
            data: datiFormOfferta,
            headers: {
                'X-CSRF-TOKEN': token
            },
            dataType: 'json',
            success: function (response) {

                $('#coupon-off').text("Coupon per quest'offerta: " + response).css('display', 'block');
            },
            error: function (xhr, status, error) {
                $('#coupon-off').text("Qualcosa è andato storto, riprova").css(
                        {
                            color: 'red',
                            display: 'block'
                        });
            }
        });
    });

    $('#coupon-user-form').on('submit', function (event) {

        let datiFormUser = $(this).serialize();
    
        event.preventDefault();

        let token = $(this).find('input[name="_token"]').val();
        
        $.ajax({
            url: "/statistiche/user",
            method: 'POST',
            data: datiFormUser,
            headers: {
                'X-CSRF-TOKEN': token
            },
            dataType: 'json',
            success: function (response) {

                $('#coupon-user').text("Coupon generati da questo utente: " + response).css('display', 'block');
            },
            error: function (xhr, status, error) {
                $('#coupon-user').text("Qualcosa è andato storto, riprova").css(
                        {
                            color: 'red',
                            display: 'block'
                        });
            }
        });
    });

});
