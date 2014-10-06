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
    terminos: {
      identifier : 'terminos',
      rules: [
        {
          type   : 'checked',
          prompt : 'Para crear la cuenta, debes aceptar nuestros términos y condciones'
        }
      ]
    },
    genero: {
      identifier : 'genero',
      rules: [
        {
          type   : 'empty',
          prompt : 'Debes seleccionar tu genero. Puedes seleccionar Prefiero no informarlo'
        }
      ]
    },
    repetirclave: {
      identifier : 'repetirclave',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, repite tu contraseña'
        },
        {
          type   : 'is[$("#clave").val()]',
          prompt : 'La contraseña no coincide con su repetición.'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur'
  })
;