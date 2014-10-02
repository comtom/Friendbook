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

$contenido = get_include_contents(template('login'));
$js = get_include_contents(javascript('login'));


include template($_SESSION['template_base']);