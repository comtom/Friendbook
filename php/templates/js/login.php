
$('.ui.form')
  .form({
    usuario: {
      identifier : 'usuario',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce tu nombre de usuario'
        }
      ]
    },
    contrasenia: {
      identifier : 'contrasenia',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce tu contrasenia'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur'
  })
;