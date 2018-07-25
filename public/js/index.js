$(document).ready(function() {
	$(document).on('click', '#check_book', function(){
		toastr.warning('You need login', 'Fail Alert', {timeOut: 2000});
	});
});