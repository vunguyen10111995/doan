$(document).ready(function() {
    $(document).on('click', '#list_fork', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        $.ajax({
            url: '/dashboard/'+ id +'/list-fork',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });

    $(document).on('click', '.nav-sidebar li a', function(e) {
        e.preventDefault();
        $(this).parent().css('background', 'green');
        $(this).parent().siblings().css('background', 'white');
    });

    $(document).on('click', '#list_request_service', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        $.ajax({
            url: '/dashboard/'+ id +'/list-request-service',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });
    
    $(document).on('click', '#list_booking', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        $.ajax({
            url: '/dashboard/'+ id +'/list-booking',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });

    $(document).on('click', '#list_plan', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        $.ajax({
            url : '/dashboard/'+ id + '/list-plan',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });

    $(document).on('click', '.view_detail_booking', function(e) {
        e.preventDefault();
        var id = $('.detail_book').val();
        $.ajax({
            url: '/dashboard/'+ id +'/detail-booking',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });

    $(function() {   
        $('.select2').select2();
    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    $(function () {
        $('.timepicker').datetimepicker({
            format: 'LT'
        });
    });
});
