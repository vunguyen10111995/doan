$(document).ready(function() {
    $('.bookingForm').on('change', '#number-adult, #number-child', function() {
        var numAdult = $('#number-adult').val();
        $.get('/plan/booking/adult',{ 'numAdult' : numAdult }, function(data) {
            if (numAdult) {
                $('.number-adult').html(numAdult);
                $('#guest-adult').html('');

                for (var i = 2; i <= numAdult; i++) {
                    $('#guest-adult').append(data);
                }
            }
        });

        var numChild = $('#number-child').val();
        $.get('/plan/booking/child',{ 'numChild' : numChild }, function(data) {
            if (numChild) {
                $('.number-child').html(numChild);
                $('#guest-child').html('');

                for (var i = 1; i <= numChild; i++) {
                    $('#guest-child').append(data);
                }
            }
        });

        var price =  $('#number-adult').data('price');
        var priceTotal = numAdult*price + numChild*price/2;
        $('.Total').html('$ ' + priceTotal);
        $('.total_amount').val(priceTotal);
        var numTotal = numAdult*1 + numChild*1;
        $('#total-number').val(numTotal);
    });

    $(document).on('click', '#btn-per', function(e) {

        let error = ['']; 

        if ($('#full_name').val() == '') {
            toastr.warning('missing fullname');
            error.push('error');
        } 

        if ($('#address').val() == '') {
            toastr.warning('missing address');
            error.push('error');
        }

        if ($('#full_name_guest').val() == '') {
            toastr.warning('missing fullname guest');
            error.push('error');
        }

        if ($('#phone').val() == '') {
            toastr.warning('missing phone');
            error.push('error');
        }

        let phone = $('#phone').val();

        if (phone % 1 != 0) {
           toastr.warning('invalid format phone');
           error.push('error');
        } 

        if ($('#email').val() == '') {
            toastr.warning('missing email');
            error.push('error');
        }

        if ($('#address_guest').val() == '') {
            toastr.warning('missing address guest');
            error.push('error');
        }

        let id = $(this).attr('plan-id');
   
        $.ajax({
            type: 'POST',
            url: '/plan/' + id + '/booking/add',
            data:  $('#form-booking').serialize(),
            success: function(response) {
                toastr.success('Booking success', 'Success Alert', {timeOut: 2000})
            },
        });

        if (error == '') {
            $('#payment-book').addClass('active-book');
            $('#payment-book').attr('href', '#payment');
            $('#payment-book').click();
            $('#payment-book').focus();  
        }
    });

    $(document).on('click', '.btn-back', function(e) {
        $('#payment-book').removeClass('active-book'); 
    });

    $(document).on('click', '.btn-payment', function(e) {
        let error = ['']; 
        let numberCard = $('#number_card').val();

        if (numberCard == '') {
            toastr.warning('missing number card');
            error.push('error');
        } 

        if (numberCard % 1 != 0) {
           toastr.warning('invalid format number card');
           error.push('error');
        } 

        if (numberCard.length < 16) {
           toastr.warning('invalid length number card');
           error.push('error');
        } 

        if ($('#cvc').val() == '') {
            toastr.warning('missing cvc');
            error.push('error');
        }

        if ($('.month').val() == 0) {
            toastr.warning('missing month');
            error.push('error');
        }

        if ($('.year').val() == 0) {
            toastr.warning('missing year');
            error.push('error');
        }

        let id = $(this).attr('plan-id');

        $.ajax({
            type: 'POST',
            url: '/plan/' + id + '/booking/payment',
            data:  $('#form-booking').serialize(),
            success: function(response) {
                toastr.success('Payment success, Please check email', 'Success Alert', {timeOut: 2000})
            },
        });

        if (error == '') {
            $('#confirm-book').addClass('active-book');
            $('#confirm-book').attr('href', '#confirm');
            $('#confirm-book').click();
            $('.close').focus();  
        }
    });
});
