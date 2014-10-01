<?php global $nacionalidades ?>

<!-- profile -->
<br>
<div class="ui horizontal full page grid segment">
  <form class="ui form stacked segment" id="form-perfil" action="" enctype="multipart/form-data" method="post" >
    <div class="ui stackable two column grid">
      <div class="ui column" style="max-width:300px; margin:30px;">
        <div class="picture field">
          <div class="ui circular segment" onclick="$(\'#picture\').click()">
            <img class="ui circular image" src="perfil/me-hd.png" alt="" />
          </div>
          <input type="file" name="picture" id="picture" accept="image/*" style="display:none;" />
        </div>

      </div>

      <div class="ui column">
        <div class="field">
          <label>Nombre de usuario</label>
          <input id="nombre_usuario" name="nombre_usuario" type="text" value="<?php echo $_SESSION['usuario'] ?>">
        </div>

        <div class="ui two column grid">
          <div class="ui column name">
            <div class="field">
              <label>Nombre</label>
              <input id="nombre" name="nombre" type="text" value="<?php echo $_SESSION['usrNombre'] ?>">
            </div>
          </div>
          <div class="ui column name">
            <div class="field">
              <label>Apellido</label>
              <input id="apellido" name="apellido" type="text" value="<?php echo $_SESSION['usrApellido'] ?>">
            </div>
          </div>
        </div>

        <div class="ui two column grid">
          <div class="ui column name">
            <div class="field">
              <label>Genero</label>
              <div class="ui fluid selection dropdown">
                <div class="text">Selecciona</div>
                <i class="dropdown icon"></i>
                <input type="hidden" name="genero" id="genero" value="<?php echo $_SESSION['usrGenero'] ?>">
                <div class="menu">
                  <div class="item" data-value="1">Masculino</div>
                  <div class="item" data-value="2">Femenino</div>
                  <div class="item" data-value="3">Prefiero no especificar</div>
                </div>
              </div>
            </div>
          </div>
          <div class="ui column name">
            <div class="date field">
              <label>Fecha Nacimiento</label>
              <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" value="<?php echo date('d/m/Y', strtotime($_SESSION['usrFecha_nacimiento'])) ?>">
            </div>
          </div>
        </div>

        <div class="field">
          <label>Nacionalidad</label>
          <div class="ui fluid selection dropdown">
            <div class="text">Selecciona tu nacionalidad</div>
            <i class="dropdown icon"></i>
            <input type="hidden" name="nacionalidad" id="nacionalidad" value="<?php echo $_SESSION['usrNacionalidad'] ?>">
            <div class="menu">
              <?php echo $nacionalidades ?>
            </div>
          </div>
        </div>

        <div class="email field">
          <label>Email</label>
          <input id="email" name="email" type="text" value="<?php echo $_SESSION['usrEmail'] ?>">
        </div>

        <div class="ui teal right floated labeled icon submit button">
          <i class="icon save"></i>  Guardar perfil
        </div>
        <br><br><br>
      </div>
    </div>
  </form>
</div>