$('#form').submit(function (e) {
	var values = $(this).serialize();
	// e.preventDefault();
	$.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		data: values,
		success: function(data){
			if (data.callback_url != '0') {
				window.location = data.callback_url + "?token=" + encodeURIComponent(data.token);
			}
			else {
				window.location.reload();
			}
			// alert(JSON.stringify(data));
		},
		error: function(){
			$('#alertlogin').show();
		}
	});
});

$('.alert').on('close.bs.alert', function (e) {
    e.preventDefault();
    $(this).fadeOut();
});