<?php global $posts ?>
<?php if (empty($posts)) { ?>
  <!-- no hay posts -->
  <div class="ui full page column grid">
    <div class="ui column" style="margin-bottom:0px;">
      <div class="ui stacked segment">
        <h2>No tienes publicaciones</h2>
        <p>
          Puedes <a href="/publicar">escribir publicaciones</a> en tu muro, o bien <a href="/amigos">agregar amigos</a> y escribir en sus muros.<br>
          Ten en cuenta que para escribir en sus muros, deben confirmar tu solicitud de amistad
        </p>
      </div>
    </div>
  </div>
<?php } else { ?>
  <?php foreach ($posts as $post) { ?>
    <!-- post -->
    <div class="ui full page column grid">
      <div class="ui column" style="margin-bottom:0px;">
        <div class="ui stacked segment">

          <div class="ui two column grid">
            <div class="ui column" style="max-width:108px;">
              <div class="ui circular segment" style="padding:5px;">
                <img class="ui circular image" src="perfil/<?php echo $post->usuario_id ?>.jpg" alt="" style="width:64px; height:64px;" />
              </div>
            </div>
            <div class="ui column" style="margin:0px;">
              <div>
                <p><big><strong><?php echo $post->nombre ?> <?php echo $post->apellido ?> (<?php echo $post->usuario ?>)</strong></big>
                <br><small><?php echo $post->fecha ?></small></p>
              </div>
            </div>
          </div>
          <p><?php echo utf8_encode($post->texto) ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>