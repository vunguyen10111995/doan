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

$(document).ready(function() {
    $(document).on('click', '.pagination li a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        getPosts(page);
        $('body,html').animate({
            scrollTop: 0
        }, 0);
    });
});
function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/user?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.change_level', function() {
        $('#edit_permission').hide();
        $('.select_permission').hide();
        $('.updateLevel').show();
        $('.updateStatus').hide();
        $('#edit_level').show();
        $('.select_level').show();
        $("form[name='form1']").css('display', 'block');
        $("form[name='form2']").css('display', 'none');
        var level = config['level'];
        var select = '';
        for(var i in level) {
            select += "<option value= '" + level[i] + "'" ;
            if(level[i] == $(this).attr('value')) {
                select += "selected";
            }
            select += ">" + i + "</option>";
        }
        $('#select_level').html(select);
        
        var id = $(this).attr('data');
        $('#select_level').attr('data-id', id);
    });
    
    $(document).on('click', '.updateLevel', function(e) {
        e.preventDefault();
        var id = $('#select_level').attr('data-id');
        var level = $('#select_level').val();
        $.ajax({
            url: '/admin/user/updateLevel',
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                id: id,
                level: level,
            }
        }).done(function(data) {
            $('#myModal').modal('hide');
            $('.'+id).replaceWith(data);
            $('#myModal').modal('hide');
            $('.'+id).replaceWith(data);
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Update successfully !');
            }, 0);
        }).fail(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Fail !');
            }, 0);
        })
    });

    $(document).on('click', '.createValue', function(e){
        e.preventDefault();
        var form = $('#form-1')[0];
        var formData = new FormData(form);

        $.ajax({
            url: '/admin/user',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false, 
        }).done(function(data) {
            console.log(data);
            $('#addValue').modal('hide');
            $('tbody').append(data);
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Create successfully !');
            }, 0);
        }).fail(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Fail !');
            }, 0);
        });
    });

    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/user/showData',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            var level = "Admin";
    
            if (data.admin_access == 0) {
                level = "Guest";
            }

            $('#form-2 #levels').val(level);
            $('#form-2 #genders').val(data.gender);
            $('#form-2 #images').attr('src', data.avatar);
            $('#form-2 #emails').val(data.email);
            $('#form-2 #full_names').val(data.full_name);
            $('#form-2 #addresss').val(data.address);
            $('#form-2 #user_names').val(data.username);
            $('#form-2 #phones').val(data.phone);
        });
    });

    $("#search_user").keyup(function() {
    var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/search/user',
                type: 'GET',
                data: {
                    key : key,
                },
                success: function(response) {
                    $('tbody').html(response);
                }   
            })  
        },1000);
    });

    $(document).on('change', '#filter_data', function(e) {
        e.preventDefault();
        $.get('/user/filter', { level : $(this).val() } , function(response){
            $('tbody').html(response);
        });
    });
});
