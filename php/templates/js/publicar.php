
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

$('#seleccionar-usuario').selectize({
    valueField: 'id',
    labelField: 'nombre',
    searchField: 'nombre',
    maxItems: 1,
    options: [],
    create: false,
    render: {
        option: function(item, escape) {
            return '<div>' +
                '<img src="' + escape(item.url) + '" alt="" style="width:24px;height:24px;margin-right:8px;"> ' +
                '<span class="title">' +
                    ' <span class="name">' + escape(item.nombre) + ' </span>' +
                '</span>' +
                '<span class="description"> (' + escape(item.usuario) + ')</span>' +
            '</div>';
        }
    },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.post('/ajax/amigos', {
            q: query,
            page_limit: 10
        }).done(function(res) {
            console.log(res.resultado);
            callback(res.resultado);
        });
    }
});