$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});

$(document).on('click', '.pagination li a', function(e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getPosts(page);
    $('html').animate({
        scrollTop: 0
    }, 0);
});

function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/request-service?page=' + page,
        }).done(function(data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.change_permission', function() {
    var status = config['status'];
        var selected = '';
        for(var i in status) {
            selected += "<option value= '" + status[i] + "'" ;
            if(status[i] == $(this).attr('value')) {
                selected += "selected";
            }
            selected += '>' + i + '</option>';
        }
        $('#select_permission').html(selected);
        var id = $(this).attr('data');
        $('#select_permission').attr('data-id', id);
    });

    $(document).on('click', '.updateStatus', function(e) {
        e.preventDefault();
        var id = $('#select_permission').attr('data-id');
        var status = $('#select_permission').val();
        $.ajax({
            url: '/admin/request-service/' + id,
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                id: id,
                status: status,
            }
        }).done(function(data) {
            $('#myModal').modal('hide');
            $('.'+id).replaceWith(data);
        })
    });

    $("#search_request_service").keyup(function() {
    var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/admin/request-service/search',
                type: 'GET',
                data: {
                    key : key,
                },
                success: function(response) {
                    $('tbody').html(response);
                }   
            })  
        }, 1000);
    });

    $(document).on('change', '#filter_data', function(e) {
        e.preventDefault();
        $.get('/admin/request-service/filter', { province_id : $(this).val() } , function(response){
            $('tbody').html(response);
        });
    });

    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/request-service/showData',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            var status = "Inprogress";
            if(data.data.status == config['status']['approved']) {
                status = "Approved";
            }
            $('#id').val(data.data.id);
            $('#form-2 #image').attr('src', data.data.image);
            $('#form-2 #name').val(data.data.name);
            $('#form-2 #address').val(data.data.address);
            $('#form-2 #user').val(data.data.user.full_name);
            $('#form-2 #category').val(data.data.category.name);
            $('#form-2 #province').val(data.data.province.name);
            $('#form-2 #price').val(data.data.price);
            $('#form-2 #status').val(status);
            $('#form-2 #open_time').val(data.data.open_time);
        });
    });
});
