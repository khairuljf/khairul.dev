jQuery(document).ready( function($){
	
	var mediaUploader;

	
	$('#upload-photo').on('click',function(e) {

		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();

			return;
		}

		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			console.log(attachment.url);
            $('#profile-picture-preview').attr("src", `${attachment.url}`);
		});
		
		mediaUploader.open();

	});

	$('#remove-photo').on('click', function(e){
		e.preventDefault();
		var answer=confirm("Are you sure you want to remove your photo ?");

		if(answe){
			$('#profile-picture').val('');
            $('#profile-picture-preview').attr("src", "");
            $('#profile-picture-preview').attr("alt", "User Image");
		}
		return ;
	});


});



