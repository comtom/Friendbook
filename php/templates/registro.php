<!-- register -->
<div class="ui basic segment">
  <form class="ui form segment" id="form-registro" action="" method="post" style="max-width:850px; min-width:450px; margin:45px auto;">
    <h1>Crear tu cuenta</h1>
    <div class="two fields">
      <div class="field">
        <label>Nombre</label>
        <input id="nombre" name="nombre" placeholder="Nombre" type="text">
      </div>
      <div class="field">
        <label>Apellido</label>
        <input id="apellido" name="apellido" placeholder="Apellido" type="text">
      </div>
    </div>
    <div class="field">
      <label>Genero</label>
      <div class="ui fluid selection dropdown">
        <div class="text">Seleccionar</div>
        <i class="dropdown icon"></i>
        <input id="genero" name="genero" type="hidden">
        <div class="menu">
          <div class="item" data-value="0">Prefiero no informarlo</div>
          <div class="item" data-value="1">Masculino</div>
          <div class="item" data-value="2">Femenino</div>
        </div>
      </div>
    </div>
    <div class="field">
      <label>Nombre de usuario</label>
      <input id="usuario" name="usuario" placeholder="Nombre de usuario" type="text">
    </div>
    <div class="field">
      <label>Email</label>
      <input id="email" name="email" placeholder="Email" type="text">
    </div>
    <div class="field">
      <label>Contrase&ntilde;a</label>
      <input id="clave" name="clave" type="password" autocomplete="off">
    </div>
    <div class="field">
      <label>Repetir Contrase&ntilde;a</label>
      <input id="repetirclave" name="repetirclave" type="password" autocomplete="off">
    </div>
    <div class="inline field">
      <div class="ui checkbox">
        <input id="terminos" name="terminos" type="checkbox">
        <label>Estoy de acuerdo con los terminos y condiciones</label>
      </div>
    </div>
    <br>
    <div class="ui teal submit button">Crear cuenta</div>
  </form>
</div>