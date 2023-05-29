
$(document).ready(function () {
    $('#num-coupon').on('click', function () {
        $.ajax({
            url: '/statsistche/',
            method: 'GET',
            dataType: 'json',
            success: function (response) {

                $('#result').text(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}