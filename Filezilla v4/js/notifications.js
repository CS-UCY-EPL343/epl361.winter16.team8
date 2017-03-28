$(function() {

    $('#admin-form-link').click(function(e) {
		$("#admin-form").delay(100).fadeIn(100);

 		$("#comments-form").fadeOut(100);
 		$("#users-form").fadeOut(100);
		$("#vipusers-form").fadeOut(100); 
		$("#contact-form").fadeOut(100);
		$("#orders-form").fadeOut(100);  

		$('#comments-form-link').removeClass('active');
		$('#users-form-link').removeClass('active');
		$('#vipusers-form-link').removeClass('active');
		$('#contact-form-link').removeClass('active');
		$('#orders-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

	$('#comments-form-link').click(function(e) {
		$("#comments-form").delay(100).fadeIn(100);

 		$("#admin-form").fadeOut(100);
 		$("#users-form").fadeOut(100);
		$("#vipusers-form").fadeOut(100);
		$("#contact-form").fadeOut(100); 
		$("#orders-form").fadeOut(100);

		$('#admin-form-link').removeClass('active');
		$('#users-form-link').removeClass('active');
		$('#vipusers-form-link').removeClass('active');
		$('#contact-form-link').removeClass('active');
		$('#orders-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

	$('#users-form-link').click(function(e) {
		$("#users-form").delay(100).fadeIn(100);

 		$("#admin-form").fadeOut(100);
 		$("#comments-form").fadeOut(100);
		$("#vipusers-form").fadeOut(100);
		$("#contact-form").fadeOut(100); 
		$("#orders-form").fadeOut(100);

		$('#admin-form-link').removeClass('active');
		$('#vipusers-form-link').removeClass('active');
		$('#comments-form-link').removeClass('active');
		$('#contact-form-link').removeClass('active');
		$('#orders-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

	$('#vipusers-form-link').click(function(e) {
		$("#vipusers-form").delay(100).fadeIn(100);

 		$("#admin-form").fadeOut(100);
 		$("#comments-form").fadeOut(100);
		$("#users-form").fadeOut(100);
		$("#contact-form").fadeOut(100);
		$("#orders-form").fadeOut(100);

		$('#admin-form-link').removeClass('active');
		$('#comments-form-link').removeClass('active');
		$('#users-form-link').removeClass('active');
		$('#contact-form-link').removeClass('active');
		$('#orders-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

	$('#contact-form-link').click(function(e) {
		$("#contact-form").delay(100).fadeIn(100);

 		$("#admin-form").fadeOut(100);
 		$("#comments-form").fadeOut(100);
		$("#users-form").fadeOut(100);
		$("#vipusers-form").fadeOut(100);
		$("#orders-form").fadeOut(100);
		
		$('#admin-form-link').removeClass('active');
		$('#comments-form-link').removeClass('active');
		$('#users-form-link').removeClass('active');
		$('#vipusers-form-link').removeClass('active');
		$('#orders-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

	$('#orders-form-link').click(function(e) {
		$("#orders-form").delay(100).fadeIn(100);

 		$("#admin-form").fadeOut(100);
 		$("#comments-form").fadeOut(100);
		$("#users-form").fadeOut(100);
		$("#vipusers-form").fadeOut(100);
		$("#contact-form").fadeOut(100);

		$('#admin-form-link').removeClass('active');
		$('#comments-form-link').removeClass('active');
		$('#users-form-link').removeClass('active');
		$('#vipusers-form-link').removeClass('active');
		$('#contact-form-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});

});
