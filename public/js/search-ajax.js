$(document).ready(function(e) {
    var timer;
    $(document).on('keyup', '#search_text', function() {
        var keyword = $(this).val();
        if (keyword.length > 0) {
            timer = setTimeout(function() {
                $.ajax({
                    method : 'GET',
                    url : 'search',
                    data : {'keyword': keyword},
                    success : function(response) {
                        $('#search-result').html(response);
                        $('#search-result').show();
                    },
                });
            }, 1000);
        } else {
            $('#search-result').hide();
        }
    });
});
$("body").click(function() {
    $('#search-result').hide();
});
