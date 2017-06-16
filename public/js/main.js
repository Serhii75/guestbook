$(document).ready(function() {
	var avatar = $('#avatar');

	avatar.on('change', function(e) {
		var fileToUpload = avatar[0].files[0];
		
		if ( fileToUpload != 'undefined' ) {
			var formData = new FormData();
			formData.append('avatar', fileToUpload);

			$.ajax({
				url: 'users/upload',
				type: 'post',
				data: 'formData',
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					if ( data['error'] ) {
						$('#uploadError').html(data['error']);
					} else {
						alert('OK!');
					}
				},
				error: function(data, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		}
	});
});