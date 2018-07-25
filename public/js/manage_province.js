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
        url: '/admin/province?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/province/showData',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            $('#form-2 #image').attr('src', data.image);
            $('#form-2 #id').val(data.id);
            $('#form-2 #name').val(data.name);
            $('#form-2 #description').val(data.description);
        });
    });

    $(document).on('click', '.createValue', function(e){
        e.preventDefault();
        var form = $('#form-1')[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/province',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false, 
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
        })
    });

    $("#search_province").keyup(function() {
    var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/province/search',
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

    $(function() {
        $('#file').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        });
    });
    function imageIsLoaded(e) {
        $('#file').css("color", 'green');
        $('#image_display').css('display', 'block');
        $('#form-2 #image').attr('src', e.target.result);
    };

    $(document).on('click', '.updateValue', function(e){
        e.preventDefault();
        var id = $('#form-2 #id').val();
        var form = $('#form-2')[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/province/' + id,
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false, 
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
});
