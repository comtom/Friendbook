<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$nombre = (!empty($_POST['nombre'])) ? mysqli_real_escape_string($con, $_POST['nombre']): '';
$apellido = (!empty($_POST['apellido'])) ? mysqli_real_escape_string($con, $_POST['apellido']): '';
$genero = (!empty($_POST['genero'])) ? mysqli_real_escape_string($con, $_POST['genero']): '3';
$usuario = (!empty($_POST['usuario'])) ? mysqli_real_escape_string($con, $_POST['usuario']): '';
$fecha_nacimiento = (!empty($_POST['fecha_nacimiento'])) ? mysqli_real_escape_string($con, $_POST['fecha_nacimiento']): '';
$nacionalidad = (!empty($_POST['nacionalidad'])) ? mysqli_real_escape_string($con, $_POST['nacionalidad']): '1';
$email = (!empty($_POST['email'])) ? mysqli_real_escape_string($con, $_POST['email']): '';
$clave = (!empty($_POST['clave'])) ? mysqli_real_escape_string($con, $_POST['clave']): '';
$repetirclave = (!empty($_POST['repetirclave'])) ? mysqli_real_escape_string($con, $_POST['repetirclave']): '';
$terminos = (!empty($_POST['terminos'])) ? mysqli_real_escape_string($con, $_POST['terminos']): '';

if ($nombre!='' and $apellido!='' and $usuario!='' and $clave!='' and $repetirclave!='' and $email!='' and $terminos!='') {
  // todos los campos completos
  if ($clave==$repetirclave) {
    // contraseña ok
    $query = "CALL setUsuario(?, ?, ?, ?, ?, ?, ?, ?);";
    if ($stmt = $con->prepare($query)) {
      $stmt->bind_param('ssssisis', $usuario, $contrasenia, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);
      $stmt->execute();

      if ($stmt->affected_rows==1) {
        $mensajeOk = 'Se han creado el usuario.';
        header('location: /login');
      } else {
        $mensajeError = 'Error: Nombre de usuario ya registrado.';
      }
      $stmt->close();
    
  } else {
    $mensajeError = 'Error: Los campos contraseña y repetir contraseña no coinciden. Deben ser iguales.';
} else {
  $mensajeError = 'Error: Debe completar todos los campos requeridos.';
}


$contenido = get_include_contents(template('registro'));
$js = get_include_contents(javascript('registro'));


include template($_SESSION['template_base']);