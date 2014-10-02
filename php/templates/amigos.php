<?php global $amigos ?>
<!-- friends -->
<div class="ui full page column grid">
  <div class="ui column">
    <div class="ui items">

    <?php foreach ($amigos as $amigo) { ?>
      <!-- friend -->
      <div class="item">
        <div class="image">
          <img src="/perfil/<?php echo $amigo->id ?>.png">
          <!--<a class="star ui corner label">
            <i class="star icon"></i>
          </a>-->
          <a class="like ui corner label" href="javascript:void(0)" title="Eliminar" onclick="$('#elimNombreAmigo').text('<?php echo $amigo->nombre .' '. $amigo->apellido  ?>'); $('#elimBoton').attr('href','/eliminar/<?php echo $amigo->id ?>'); $('#eliminarModal').modal('show');">
            <i class="delete icon"></i>
          </a>
        </div>
        <div class="content">
          <div class="name"><?php echo $amigo->nombre .' '. $amigo->apellido .' ('.  $amigo->usuario .')' ?></div>
          <p class="description">
            Sexo: <?php echo $amigo->genero ?><br>
            Fecha nacimiento: <?php echo $amigo->fecha_nacimiento ?><br><br>
            <!--<i class="ui users icon"></i><?php echo $amigo->cantidad_amigos ?> Amigos-->
            <a class="ui small floated right labeled teal icon button" href="verperfil/<?php echo $amigo->id ?>"><i class="ui photo icon"></i> Ver Perfil</a>
          </p>
        </div>
      </div>
    <?php } ?>

    </div>
  </div>
</div>

<!-- buscar amigos -->
<div class="" style="margin:20px auto; max-width:860px;">
  <div class="ui purple segment">
    <h2>Agregar amigos</h2>
    <div class="column">
      <center>
        <form class="ui form" style="max-width:960px; margin-left:120px;">
          <div class="ui two column fixed grid">
            <div class="eight wide column">
              <div class="ui field" style="margin-left:30px;">
                <input type="text" placeholder="Nombre de usuario" name="buscar" />
              </div>
            </div>
            <div class="four wide column">
              <div class="ui labeled teal icon button"><i class="ui add icon"></i> Invitar</div>
            </div>
          </div>
        </form>
      </center>
    </div>
  </div>
</div>

<!-- modal -->
<div class="ui modal" id="eliminarModal">
  <i class="close icon"></i>
  <div class="header">
    Eliminar amigo
  </div>
  <div class="content">
    ¿Est&aacute;s seguro que deseas dejar de ser amigo de <span id="elimNombreAmigo"></span>?
  </div>
  <div class="actions">
    <div class="ui button">
      Cancelar
    </div>
    <a id="elimBoton" href="/eliminar/" class="ui labeled icon red button">
      <i class="icon delete"></i>
      Eliminar
    </a>
  </div>
</div>