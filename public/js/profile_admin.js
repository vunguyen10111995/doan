$(document).ready(function() {
    var gender = config['gender'];
    var selected = '';
    for(var i in gender) {
        selected += "<option value= '" + gender[i] + "'" ;
        if(gender[i] == $('#gender').attr('value')) {
            selected += "selected";
        }
        selected += '>' + i + '</option>';
    }
    $('#gender').html(selected);

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
        $('#image').attr('src', e.target.result);
    };

    $(document).on('click', '.update', function(e) {
        e.preventDefault();
        var id = $('#id').val();
        var form = $('#form-2')[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/user/' + id,
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false, 
        }).done(function(data) {
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

    $(document).on('click', 'updatepassword', function(event) {
        event.preventDefault();
        var id = $('.hidden_id').val();
        $.ajax({
            url: '/admin/change-password/' + id,
            type: 'POST',
            data: {
                new_password: $('#new_password').val(),
                re_new_password: $('#re_new_password').val(),
            }
        }).done(function(data) {
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
});
