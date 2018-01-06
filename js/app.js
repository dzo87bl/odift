$(document).ready(function() {
	
	/* nav dropdown menu */
	if ($(window).width() > 768) {
		$('#navbar .nav').removeClass('animated bounceInDown');
		$('ul.nav li.dropdown').hover(function() {
			//$(this).find('.dropdown-menu').stop(true, true).fadeIn();
			//$(this).find('.dropdown-menu').stop(true, true).slideDown();
			$(this).find('.dropdown-menu').removeClass('animated flipOutY').addClass('animated rubberBand');
			$(this).addClass('open');
		}, function() {
			//$(this).find('.dropdown-menu').stop(true, true).fadeOut();
			//$(this).find('.dropdown-menu').stop(true, true).slideUp();
			//$(this).find('.dropdown-menu').removeClass('animated flipInY').addClass('animated flipOutY');
			$(this).removeClass('open');
		});
	} else {
		$('#navbar .nav').addClass('animated bounceInDown');
	}
	
	/* remove focus from bootstrap btn */
	$('.btn').focus(function(event) {
		event.target.blur();
	});

	/* remove empty p tag */
	$('p').each(function() {
		var $this = $(this);
		if ($this.html().replace(/\s|&nbsp;/g, '').length == 0)
			$this.remove();
	});

	/* remove error image */
	$("img").error(function () { 
    	$(this).hide(); 
	});
	
	/* window scroll */
	// $fn.scrollSpeed(step, speed, easing);
	jQuery.scrollSpeed(100, 600);
	
	/* form */
	$('#form_exif').on('submit', function(e) {
		var data = $('#form_exif').serialize();
		//console.log(data);
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : data,
			url : 'ajax/exif.php',
			cache : false,
			//async: false,
			//processData: false,
			//contentType: false,
			success : function(response) {
				if (response.error == 0) {
					if (response.info == 1) {
						$('#table_exif').html(response.msg);
						//console.log(response.msg);
					}
					if (response.info == 2) {
						$('#table_exif').html(null);
						$('#img_exif').attr('src', 'ajax/' + response.msg).removeAttr("style");
						//console.log(response.msg);
					}
				}
			}
		});
		return false;
	});

});

$(function() {
	var myDropzone = new Dropzone(".dropzone", {
		uploadMultiple: false,
		maxFilesize: 5,
		maxFiles: 1
		//addRemoveLinks : true,
   		//acceptedFiles : "application/pdf",
	});
	myDropzone.on("success", function( file, response ) {
   		obj = JSON.parse( response );
   		$('#file_path').val( obj.file );
	});
});