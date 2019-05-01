/*
* Login Validation
*/
$(function() {
  $("#login-form").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      password: {
        minlength: 6,
        required: true
      }
    },
    messages: {
      email: {
        required: "Coloque seu email",
        email: "Email inválido"
      },
      password: {
        minlength: "Senha deve ter no mínimo 6 caracteres",
        required: "Coloque sua senha"
      }
    },
    invalidHandler: function() {
      swal("Dados incorretos", "Verifique os dados informados e tente novamente", "warning")
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

$('#simulaErro').click(function() {
  swal('Dados inválidos', 'Por favor, verifique os dados informados', 'error');
});
