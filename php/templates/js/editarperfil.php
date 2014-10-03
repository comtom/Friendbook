
$('#fecha_nacimiento').datetimepicker({
format: 'dd/mm/yyyy',
autoclose: true,
startView: 2,
minView: 2
});

$('.ui.form')
  .form({
    nombre_usuario: {
      identifier : 'nombre_usuario',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce tu nombre de usuario'
        }
      ]
    },
    nombre: {
      identifier : 'nombre',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce tu nombre'
        }
      ]
    },
    apellido: {
      identifier : 'apellido',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor, introduce tu apellido'
        }
      ]
    },
    nacionalidad: {
      identifier : 'nacionalidad',
      rules: [
        {
          type   : 'empty',
          prompt : 'Selecciona tu nacionalidad de la lista'
        }
      ]
    },
    fecha_nacimiento: {
      identifier : 'fecha_nacimiento',
      rules: [
        {
          type   : 'empty',
          prompt : 'Selecciona tu fecha de nacimiento'
        }
      ]
    },
    email: {
      identifier : 'email',
      rules: [
        {
          type   : 'empty',
          prompt : 'Debes indicar tu email'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur'
  })
;