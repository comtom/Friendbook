
$('.invitar.submit.button').click(function(){
    if ( $('#seleccionar-usuario').val()!='' ){
        $('#form-agregaramigo').attr('action','/agregar/'+ $('#seleccionar-usuario').val());
        $('#form-agregaramigo').submit();
    }
});

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
        $.post('/ajax/usuarios', {
            q: query,
            page_limit: 10
        }).done(function(res) {
            console.log(res.resultado);
            callback(res.resultado);
        });
        /*
        $.ajax({
            url: '/ajax/usuarios',
            type: 'POST',
            dataType: 'jsonp',
            data: {
                q: query,
                page_limit: 10
            },
            error: function() {
                callback();
            },
            success: function(res) {
                console.log(res.resultado);
                callback(res.resultado);
            }
        });
       */
    }
});