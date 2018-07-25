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
        $('html').animate({
            scrollTop: 0
        }, 0);
    });
});
function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/category?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.change_permission', function() {
        var status = config['status'];
        var select = '';
        for(var i in status) {
            select += "<option value= '" + status[i] + "'" ;
            if(status[i] == $(this).attr('value')) {
                select += "selected";
            }
            select += '>' + i + '</option>';
        }
        $('#select_permission').html(select);
        
        var id = $(this).attr('data');
        $('#select_permission').attr('data-id', id);
    });
    
    $(document).on('click', '.updateStatus', function(e) {
        e.preventDefault();
        var id = $('#select_permission').attr('data-id');
        var status = $('#select_permission').val();
        $.ajax({
            url: '/admin/category/updateStatus',
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                id: id,
                status: status,
            }
        }).done(function(data) {
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
        });
    });

    $(document).on('click', '.createValue', function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/category/store',
            data: {
                _token: $('input[name=_token]').val(),
                name: $('#name').val(),
                status: $('#status').val(),
            },
            type: 'POST',
        }).done(function(data) {
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

    $(document).on('click', '.updateValue', function(e){
        e.preventDefault();
        var id = $('#form-2 #id').val();
        $.ajax({
            url: '/admin/category/update',
            data: {
                _token: $('input[name=_token]').val(),
                id: id,
                name: $('#form-2 #name').val(),
                status: $('#form-2 #select_status').val(),
            },
            type: 'POST',
        }).done(function(data) {
            $('#viewModal').modal('hide');
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
        }).fail(function(data) {
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

    $("#search_category").keyup(function() {
    var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/admin/category/search',
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

    $(document).on('change', '#filter_category', function(e) {
        e.preventDefault();
        $.get('/admin/category/filter', { status : $(this).val() } , function(response){
            $('tbody').html(response);
        });
    });

    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/category/show',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            var status = 'Inprogress';
            if (data.status == 1) {
                status = 'Approved';
            }
            $('#form-2 #id').val(data.id);
            $('#form-2 #name').val(data.name);
            $('#form-2 #status').val(status);
            var status = config['status'];
            var select = '';
            for(var i in status) {
            select += "<option value= '" + status[i] + "'" ;
            if(status[i] == data.status ) {
                select += "selected";
            }
            select += '>' + i + '</option>';
        }  
            $('#form-2 #select_status').html(select);
        });
    });

    $(document).on('click', '.delete_category', function() {
        var id = $(this).attr('data-id');
        confirm('Do you want delete this service') ? $.ajax({
            url: '/admin/category/delete',
            type: 'DELETE',
            data: {
                id: id,
            }
        }).done(function(data) {
            
        }) : false
        
    });
});
