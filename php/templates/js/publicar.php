
$('.ui.form')
  .form({
    usuario_destinatario: {
      identifier : 'usuario_destinatario',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce el nombre de tu amigo'
        }
      ]
    },
    texto: {
      identifier : 'texto',
      rules: [
        {
          type   : 'empty',
          prompt : 'La publicación debe contener texto'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur'
  })
;