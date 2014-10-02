<?php global $posts ?>
<?php global $amigos ?>
<!-- friends -->
<?php if(count($amigos)>0) { ?>
<div class="ui full page column grid">
  <div class="ui column" style="margin-top:20px; margin-bottom:0px;">
    <div class="ui teal segment">
      <h2>Usuarios</h2>
    </div>
  </div>
</div>
<?php } ?>
<div class="ui full page column grid">
  <div class="ui column">
    <div class="ui items" style="max-width:1100px; margin:10px auto;">
    <?php foreach ($amigos as $amigo) { ?>
      <!-- friend -->
      <div class="item">
        <div class="image">
          <img src="/perfil/<?php echo $amigo->id ?>.png">
          <!--<a class="star ui corner label">
            <i class="star icon"></i>
          </a>-->
          <a class="star ui corner label" href="/agregar/<?php echo $amigo->id ?>" title="Agregar a mis amigos">
            <i class="star icon"></i>
          </a>
        </div>
        <div class="content">
          <div class="name"><?php echo $amigo->nombre .' '. $amigo->apellido .'<br>'.  $amigo->usuario .'' ?></div>
          <p class="description">
            Sexo: <?php echo $amigo->genero ?><br>
            Fecha nacimiento: <?php echo $amigo->fecha_nacimiento ?><br><br>
            <a class="ui small floated right labeled teal icon button" href="verperfil/<?php echo $amigo->id ?>"><i class="ui photo icon"></i> Ver Perfil</a>
          </p>
        </div>
      </div>
    <?php } ?>

    </div>
  </div>
</div>

<?php if(count($posts)>0) { ?>
<div class="ui full page column grid">
  <div class="ui column" style="margin-top:20px; margin-bottom:0px;">
    <div class="ui teal segment">
      <h2>Publicaciones</h2>
    </div>
  </div>
</div>
<?php } ?>
<?php foreach ($posts as $post) { ?>
          <!-- post -->
          <div class="ui full page column grid">
            <div class="ui column" style="margin-bottom:0px;">
              <div class="ui stacked segment">

                <div class="ui two column grid">
                  <div class="ui column" style="max-width:108px;">
                    <div class="ui circular segment" style="padding:5px;">
                      <img class="ui circular image" src="perfil/<?php echo $post->usuario_id ?>.png" alt="" style="width:64px; height:64px;" />
                    </div>
                  </div>
                  <div class="ui column" style="margin:0px;">
                    <div>
                      <p><big><strong><?php echo $post->nombre ?> <?php echo $post->apellido ?> (<?php echo $post->usuario ?>)</strong></big>
                      <br><small><?php echo $post->fecha ?></small></p>
                    </div>
                  </div>
                </div>
                <p><?php echo $post->texto ?></p>
              </div>
            </div>
          </div>
<?php } ?>