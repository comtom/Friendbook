<?php
global $config;
include view('solicitudes');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FriendBook</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <!-- Social SHARE image -->
        <link rel="image_src" type="image/jpeg" href="/images/share.png">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/semantic.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" href="/css/selectize.css">
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
        <style>
        .ui.feed a {
          cursor: pointer;
        }
        a:hover {
          color: #00BAFF;
        }
        a {
          color: #009FDA;
          text-decoration: none;
        }
        #left-menu {
          top: 43px;
        }
        #right-content {
          margin-left: 275px;
          padding: 15px;
          padding-top: 57px;
        }
        #content {
          padding-top: 57px;
        }
        #hidden-actions-menu {
          position: fixed;
          /*float:right;*/
          margin-top: -50px;
          left: 228px;
        }
        .breadcrumb .section {
          text-decoration: none;
          color: #888;
        }
        .ui.circular.segment:hover {
          background: #EEE;
        }
        #left-menu .item {
          cursor: pointer;
        }
        .ui.column.name {
          margin: 0px;
        }
        #showMenu {
          width: 49px;
          height: 49px;
          top: 47px;
          left: 266px;
          position: absolute;
          z-index: 100;
          background: #eee;
          border-top-left-radius: 0px;
          border-bottom-left-radius: 0px;
        }
        .left.spaced {
          margin-left: 25px;
        }
        body {
          background-color: #F2F6F7;
        }
        </style>

    </head>
    <body>
        <!-- outdated browser message -->
        <!--[if lt IE 7]>
        <div class="ui icon message">
          <i class="browser icon"></i>
          <div class="content">
            <div class="header">
              Tu navegador es obsoleto!
            </div>
            <p>Estas usando un navegador <strong>muy viejo</strong>. Por favor, <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar tu experiencia.</p>
          </div>
        </div>
        <![endif]-->

        <div class="ui fixed top inverted purple menu" style="margin:0px;">
          <img src="/images/logo.png" height="36" width="36" style="width:36px; height:36px; margin-right:2px;"/>
          <a class="<?php if(isset($novedades)) echo 'active' ?> item tab" href="/">
            <i class="inbox icon"></i><span class="phone hide"> Novedades</span>
          </a>
          <a class="<?php if(isset($publicar)) echo 'active' ?> item tab" href="/publicar">
            <i class="edit icon"></i><span class="phone hide"> Publicar</span>
          </a>
          <a class="<?php if(isset($amigos)) echo 'active' ?> item tab" href="/amigos">
            <i class="users group icon"></i><span class="phone hide"> Amigos</span>
          </a>
          <div class="right menu">
            <form id="form-buscar" method="post" action="/buscar" class="item phone hide">
              <div class="ui icon input">
                <input class="ui search" type="text" name="texto" placeholder="Buscar..." style="max-width:220px;">
                <i class="search link icon"></i>
              </div>
            </form>
            <div class="ui dropdown item"><i class="bell icon"></i>
              <?php if( !empty($cant_solicitudes) and $cant_solicitudes>0){ ?>
                <div class="floating ui circular red label" style="min-height:1.8em; min-width:2em; top:0em;"><?php echo $cant_solicitudes ?></div>
              <?php }?>
              <div class="menu" style="left:-299px;" id="doubleheight">
                <?php if(!empty($cant_solicitudes)) { ?>
                  <?php foreach ($solicitudes as $solicitud) { ?>
                  <span class="item"><img src="<?php echo getFotoPerfil($solicitud->usuario_id) ?>" alt="" style="height:24px; width:24px; margin-right:5px;">
                    <span style="display:inline-flex; width:200px !important; overflow:hidden;"><?php echo $solicitud->nombre .' '. $solicitud->apellido ?></span>
                    <a href="/rechazar/<?php echo $solicitud->id ?>" class="ui button tiny" style="margin-left:3px; margin-right:3px;">Rechazar</a>
                    <a href="/aceptar/<?php echo $solicitud->id ?>" class="ui teal button tiny" style="color:#fff !important; margin-left:3px;">Aceptar</a>
                  </span>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
            <div class="ui dropdown item"><i class="user icon"></i><i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="/editarperfil"><i class="settings icon"></i> Editar Perfil</a>
                <a class="item feedback" href="javascript:void(0)"><i class="comment outline icon"></i> Enviar Sugerencias</a>
                <a class="item" href="/logout"><i class="sign out icon"></i> Salir</a>
              </div>
            </div>
          </div>
        </div>
        <br><br>

        <?php if(isset($mensajeError)) echo '<div class="ui warning message" style="max-width:960px; margin:30px auto; margin-bottom:0px;"><i class="close icon" onclick="$(this).parent().remove()"></i><div class="header">Oops, ha ocurrido un error</div>'. $mensajeError .'</div>' ?>
        <?php if(isset($mensajeOk)) echo '<div class="ui success message" style="max-width:960px; margin:30px auto; margin-bottom:0px;"><i class="close icon" onclick="$(this).parent().remove()"></i><div class="header">Exito!</div>'. $mensajeOk .'</div>' ?>

        <!-- contenido -->
        <?php echo $contenido ?>

        <!-- modal -->
        <div class="ui feedback small modal">
            <div class="ui piled segment">
              <h2 class="ui header">
                <i class="icon inverted circular teal comment"></i> Envianos tus comentarios
              </h2>
              <div class="ui comments">
                <form class="ui form" id="feedback" action="#" method="post">
                  <div class="field">
                    <textarea name="message"></textarea>
                  </div>
                  <div class="ui fluid teal labeled submit feedback icon button">
                    <i class="icon edit"></i> Enviar comentarios
                  </div>
                </form>
              </div>
            </div>
        </div>

        <script src="/js/vendor/jquery-1.10.2.min.js"></script>
        <script src="/js/semantic.js"></script>
        <script src="/js/plugins.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/js/selectize.min.js"></script>
        <script src="/js/vendor/jquery-address.js"></script>
        <script>

        // -----
            $('.ui.dropdown')
              .dropdown()
            ;
            $('.ui.checkbox')
              .checkbox()
            ;

            // feedback
            $('.item.feedback')
              .click(function(){
                $('.feedback.modal')
                  .modal('show')
                ;
              })
            ;
            $('.submit.feedback.icon.button')
              .click(function(){
                $('.feedback.modal')
                  .modal('hide')
                ;
                $('#feedback')
                  .submit()
                ;
              })
            ;

            <?php if(isset($js)) echo $js; ?>

            // solo para las vistas con menu a la izquierda
            $('#showMenu').click(function(){
              if ($('#left-menu').hasClass('active')) {
                $('#left-menu').removeClass('active');
                $('#showMenu').css('left','-10px');
                $('#right-content').css('margin-left','0px','important');
              } else {
                $('#left-menu').addClass('active');
                $('#showMenu').css('left','266px');
                $('#right-content').css('margin-left','275px','important');
              }
            });

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-51855748-2', 'cowfunny.com');
            ga('send', 'pageview');
      </script>
    </body>
</html>
