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

$(document).ready(function() {
    $('#mySelectBox').change(function () {
        var province = [];
        $.each($('#mySelectBox option:selected'), function () {
            province.push({
                id: $(this).val(),
                name: $(this).text(),
            });
        });

        var change = '';
        for (var i = 0; i < province.length; i++) {
            change += '<option value = "' + province[i].id + '">' + province[i].name + '</option>';
        }

        $('.province').html(change);
    });

    $('#number-services').on('change', function() {
        var changes = '';
        var province = [];
        $.each($('#mySelectBox option:selected'), function () {
            province.push({
                id: $(this).val(),
                name: $(this).text()
            });
        });
        
        for (var j = 0; j < province.length; j++) {
            changes += '<option value = "' + province[j].id + '">' + province[j].name + '</option>';
        }
     
        var id = $('#number-services').val();
        $.get('/address/result', { 'id' : id }, function(data) {
            if (id) {
                $('#expand').html('');
                for (var i = 1; i <= id; i++) {
                    $('#expand').append('<p class="number-services"> ' + i + '</p>');
                    $('#expand').append(data);
                    $('.province').html(changes);
                }
            } 
        });
    });

    $(document).on('change', '.category', function () {
        var category = $(this);
        var province_id = $(this).parents('.filter').find('.province').val();
        var category_id = $(this).val();

        callService(category, province_id, category_id);
    });

    $(document).on('change', '.province', function () {
        var province = $(this);
        var category_id = $(this).parents('.filter').find('.category').val();
        var province_id = $(this).val();
    
        callService(province, province_id, category_id);
    });
    
    function callService(selector, province_id, category_id) {
        $.ajax({
            method : 'GET',
            url : '/schedule/showservice',
            data : { 'province_id' : province_id, 'category_id' : category_id },
            success : function(response) {
                selector.parents('.filter').find('.service').html(response);
            },
        });
    }

    $(document).on('click', '#show-gallery', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/plan/gallery',
            type: 'GET',
            success : function(response) {
                $('#show_info').html(response);
            }
        });
    });

    $(document).on('change', '.select-plan', function(e) {
        let id = $(this).parents('.filter').find('.select-plan').val();
        e.preventDefault();
        $.ajax({
            url: '/plan/gallery/' + id + '/detail',
            type: 'GET',
            success : function(response) {
                $('.img-detail').html(response);
            }
        });
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
        $('#file').css('color', 'green');
        $('#image_display').css('display', 'block');
        $('#image_gallery').attr('src', e.target.result);
    }; 
});
