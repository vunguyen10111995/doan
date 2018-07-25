$(document).ready(function(e) {
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
        $('#image_update').attr('src', e.target.result);
        $('#image_update').attr('width', '320px');
        $('#image_update').attr('height', '240px');

    }; 
});

$(function() {
     $('#image').hover(over, out);
});

function over(event) {
    if (!$('#mask').is(':animated')) {
        $('#mask').fadeIn();
        $('#mask').css('display','block');
    }
}

function out(event) {
    if (!$('#mask').is(':animated')) {
        $('#mask').fadeOut();
   }
} 

function showImage(){
    $('#image_update').toggle();
}
