  $('.submit.button').click(function(){
    $('#form-registro').submit();
  });

$('.ui.form')
  .form({
    nombre: {
      identifier  : 'nombre',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, ingresa tu nombre'
        }
      ]
    },
    apellido: {
      identifier  : 'apellido',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, ingresa tu apellido'
        }
      ]
    },
    usuario: {
      identifier  : 'usuario',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, tipea tu nombre de usuario'
        }
      ]
    },
    email: {
      identifier : 'email',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, ingresa tu email'
        }
      ]
    },
    clave: {
      identifier : 'clave',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, ingresa tu contraseña'
        }
      ]
    },
    repetirclave: {
      identifier : 'repetirclave',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, repite tu contraseña'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur'
  })
;