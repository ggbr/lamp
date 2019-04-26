/*
* Forgot-password Validation
*/
$(function() {
	$("#forgot-password-form").validate({
	  rules: {
		email: {
		  required: true,
		  email: true
		},
  	  },
	  messages: {
		email: {
		  required: "Coloque seu email",
		  email: "Email Inválido"
		},
	  },
	  errorElement: 'div',
	  errorPlacement: function(error, element) {
		var placement = $(element).data('error');
		if (placement) {
		  $(placement).append(error)
		} else {
		  error.insertAfter(element);
		}
	  }
	});
  });
