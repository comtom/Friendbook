<?php global $perfil ?>
<!-- view profile -->
<br>
<?php if(isset($perfil)){ ?>
<div class="ui horizontal full page grid segment">
  <div class="ui form piled segment">
    <div class="ui stackable two column grid">
      <div class="ui column" style="max-width:300px; margin:30px;">

        <div class="picture field">
          <div class="ui circular segment">
            <img class="ui circular image" src="/perfil/<?php echo $perfil->id ?>.jpg" alt="" />
          </div>
          <input type="file" name="picture" accept="image/*" style="display:none;" />
        </div>

      </div>

      <div class="ui column">
        <div class="field">
          <h2><small>Perfil de </small><?php echo $perfil->usuario ?></h2>
        </div>

        <div class="ui two column grid">
          <div class="ui column name">
            <div class="field">
              <p><small>Nombre: </small><?php echo $perfil->nombre ?></p>
            </div>
          </div>
          <div class="ui column name">
            <div class="field">
              <p><small>Apellido: </small><?php echo $perfil->apellido ?></p>
            </div>
          </div>
        </div>

        <div class="ui two column grid">
          <div class="ui column name">
            <div class="field">
              <p><small>Genero: </small><?php echo $perfil->genero ?></p>
            </div>
          </div>
          <div class="ui column name">
            <div class="field">
              <p><small>Fecha Nacimiento: </small><?php echo $perfil->fecha_nacimiento ?></p>
            </div>
          </div>
        </div>

        <div class="field">
          <p><small>Nacionalidad: </small><?php echo $perfil->nacionalidad ?></p>
        </div>

        <div class="email field">
          <p><small>Email: </small><?php echo $perfil->email ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="ui horizontal page grid ">
  <div class="ui column stacked segment ">
    <div class="">
        <center>
          <h1>No tienes acceso a este perfil</h1>
          <p>
            Para poder ver un perfil de otro usuario, primero debes <a href="/amigos">invitar</a> al usuario.<br>
            Recuerda que antes de poder ver el perfil, el usuario debe aceptar tu solicitud.
          </p>
        </center>
    </div>
  </div>
</div>
<?php };  ?>

<?php global $posts ?>
<div style="margin-top:30px;"></div>
<?php foreach ($posts as $post) { ?>
          <!-- post -->
          <div class="ui full page column grid">
            <div class="ui column" style="margin-bottom:0px;">
              <div class="ui stacked segment">

                <div class="ui two column grid">
                  <div class="ui column" style="max-width:108px;">
                    <div class="ui circular segment" style="padding:5px;">
                      <img class="ui circular image" src="/perfil/<?php echo $post->usuario_id ?>.jpg" alt="" style="width:64px; height:64px;" />
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