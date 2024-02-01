$(document).ready(function() {
    $('.slider').slick({
        dots: true,
        arrows: true,
        autoplay: true
    });

    $("#check-out").datepicker({
        dateFormat: "dd.mm.yy"
    });
    $("#check-in").datepicker({
        dateFormat: "dd.mm.yy"
    });

    $('#form-prijava').submit(function(event) {
        event.preventDefault();

        var username = $('#form-prijava input[name=username]').val();
        var password = $('#form-prijava input[name=password]').val();

        var successMessage = 'Uspješna prijava!';
        var errorMessage = 'Pogrešno korisničko ime ili lozinka!';

        $.ajax({
            method: "POST",
            url: 'autorizacija.php',
            data: { username: username, password: password },
            success: function(response) {
                if(response == 'true') {
                    $('.message-prijava').text(successMessage);
                    setTimeout(function() { 
                        location.reload(); 
                    }, 500);
                }
                else {
                    $('.message-prijava').text(errorMessage);
                } 
            }
        });

    });

    $('#form-registracija').submit(function(event) {
        event.preventDefault();

        var username = $('#form-registracija input[name=username]').val();
        var email = $('#form-registracija input[name=email]').val();
        var tel = $('#form-registracija input[name=tel]').val();
        var password = $('#form-registracija input[name=password]').val();

        var successMessage = 'Uspješna registracija!';
        var errorEmailMessage = 'E-mail koji ste unijeli već se koristi!';
        var errorMessage = 'Neuspješna registracija, pokušajte ponovno!';

        $.ajax({
            method: "POST",
            url: 'autorizacija.php',
            data: { username: username, email: email, tel: tel, password: password },
            success: function(response) {
                if(response == 'true') {
                    $('.message-registracija').text(successMessage);
                    setTimeout(function() { 
                        location.reload(); 
                    }, 500);
                }
                else if(response == 'email') {
                    $('.message-registracija').text(errorEmailMessage);
                }
                else {
                    $('.message-registracija').text(errorMessage);
                }
            }
        });

    });

    $('#reservation-modal form').submit(function(event) {
        event.preventDefault();

        var first_name = $('#reservation-modal form input[name=last-name]').val();
        var last_name = $('#reservation-modal form input[name=first-name]').val();
        var email = $('#reservation-modal form input[name=email]').val();
        var tel = $('#reservation-modal form input[name=tel]').val();
        var check_in = $('#reservation-modal form input[name=check-in]').val();
        var check_out = $('#reservation-modal form input[name=check-out]').val();
        var room = $('#reservation-modal form input[name=room]').val();

        $.ajax({
            method: "POST",
            url: 'rezerviraj.php',
            data: { first_name: first_name, last_name: last_name, email: email, tel: tel, check_in: check_in, check_out: check_out, room: room },
            success: function(response) {
                $('#reservation-modal .message').text(response);
            }
        });

    });

    $('.room-container button').click(function() {
        $('#reservation-modal .modal-title').text('Rezervacija ' + '('+ $(this).attr('data-room') +')');
        $('#reservation-modal input[type=text], #reservation-modal input[type=email]').val('');
        $('#reservation-modal .message').text('');

        $('#reservation-modal input[name=room]').val($(this).attr('data-room'));
    });


});