<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$usuario = (!empty($_POST['usuario'])) ? mysqli_real_escape_string($con, $_POST['usuario']): '';
$contrasenia = (!empty($_POST['contrasenia'])) ? mysqli_real_escape_string($con, $_POST['contrasenia']): '';

if ($usuario!='' and $contrasenia!='') {
  $query = "CALL login(?, ?);";
  if ($stmt = $con->prepare($query)) {
      $stmt->bind_param('ss', $usuario, $contrasenia);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);
      $stmt->fetch(); // viene siempre solo 1 resultado o ninguno

      if ($stmt->num_rows==1) {
        $_SESSION['logueado'] = True;
        $_SESSION['usrId'] = $id;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['usrNombre'] = $nombre;
        $_SESSION['usrApellido'] = $apellido;
        $_SESSION['usrGenero'] = $genero;
        $_SESSION['usrFecha_nacimiento'] = $fecha_nacimiento;
        $_SESSION['usrNacionalidad'] = $nacionalidad;
        $_SESSION['usrEmail'] = $email;

        header('location: /novedades');
      }

      $stmt->close();
  }
}

$contenido = '<!-- vista login -->
        <div class="ui form segment" style="width:450px; margin:65px auto;">
          <h3 style="color:#888;">Entrar en FriendBook</h3>
          <form id="form-login" action="" method="post">
          <div class="field">
            <label>Usuario</label>
            <div class="ui left labeled icon input">
              <input name="usuario" type="text" placeholder="Usuario">
              <i class="user icon"></i>
              <div class="ui corner label">
                <i class="icon asterisk"></i>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Contraseña</label>
            <div class="ui left labeled icon input">
              <input name="contrasenia" type="password" autocomplete="off" placeholder="Contraseña" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
              <i class="lock icon"></i>
              <div class="ui corner label">
                <i class="icon asterisk"></i>
              </div>
            </div>
          </div>
          <input class="hidden" type="submit" value=""/>
          <div class="ui teal submit button">Ingresar</div>
          <a class="ui button floated right" href="/registro">Crear una cuenta</a>
        </form>
        </div>';

$js = "
  $('.submit.button').click(function(){
    $('#form-login').submit();
  });
";

include template($_SESSION['template_base']);