<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$nombre_usuario = (!empty($_POST['nombre_usuario'])) ? mysqli_real_escape_string($con, $_POST['nombre_usuario']): '';
$nombre = (!empty($_POST['nombre'])) ? mysqli_real_escape_string($con, $_POST['nombre']): '';
$apellido = (!empty($_POST['apellido'])) ? mysqli_real_escape_string($con, $_POST['apellido']): '';
$genero = (!empty($_POST['genero'])) ? mysqli_real_escape_string($con, $_POST['genero']): '';
$fecha_nacimiento = (!empty($_POST['fecha_nacimiento'])) ? mysqli_real_escape_string($con, $_POST['fecha_nacimiento']): '';
$nacionalidad = (!empty($_POST['nacionalidad'])) ? mysqli_real_escape_string($con, $_POST['nacionalidad']): '';
$email = (!empty($_POST['email'])) ? mysqli_real_escape_string($con, $_POST['email']): '';

if ($nombre_usuario!='' and $nombre!='' and $apellido!='' and $genero!='' and $fecha_nacimiento!='' and $nacionalidad!='' and $email) {
  // form valido, guarda


  if ($_FILES["picture"]["error"]==0) {
    $path = $config['media']. "/perfil/";

    $img = $_FILES['picture']['tmp_name'];
    $id = $_SESSION['usrId'];

    if (($img_info = getimagesize($img)) === FALSE) {
      header('location: /editarperfil');
    }

    $width = $img_info[0];
    $height = $img_info[1];

    switch ($img_info[2]) {
      case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
      case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
      case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
      default : header('location: /editarperfil');
    }

    $tmp = imagecreatetruecolor(256, 256);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, 256, 256, $width, $height);

    $dst = $path .$id.'.jpg';
    touch($dst);
    chmod($dst, 0644);
    imagejpeg($tmp, $dst);
    chmod($dst, 0644);

    //move_uploaded_file($tmp, "$path.jpg");
  }

  // conversion de formato fecha
  //$fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $fecha_nacimiento);
  //$fecha_nacimiento = $fecha_nacimiento->format('Y-m-d');

  $query = "UPDATE `Usuario`
        SET
        `usuario`=?,
        `nombre`=?,
        `apellido`=?,
        `genero`=?,
        `fecha_nacimiento`=?,
        `nacionalidad`=?,
        `email`=?
        WHERE `id`=?;";
  if ($stmt = $con->prepare($query)) {
      $stmt->bind_param('sssisisi', $nombre_usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email, $_SESSION['usrId']);
      $stmt->execute();
      $mensajeOk = 'Se han actualizado correctamente los datos de tu perfil.';

      $stmt->close();
  }

  $_SESSION['usuario'] = $nombre_usuario;
  $_SESSION['usrNombre'] = $nombre;
  $_SESSION['usrApellido'] = $apellido;
  $_SESSION['usrGenero'] = $genero;
  $_SESSION['usrFecha_nacimiento'] = $fecha_nacimiento;
  $_SESSION['usrNacionalidad'] = $nacionalidad;
  $_SESSION['usrEmail'] = $email;
}


// lista de nacionalidades
$nacionalidades = '';
$query = "CALL getNacionalidades();";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nombre);

    while ($stmt->fetch()) {
        $nacionalidades.= '<div class="item" data-value="'. $id.'">'. $nombre .'</div>';
    }
    $stmt->close();
}

$contenido = get_include_contents(template('editarperfil'));
$js = get_include_contents(javascript('editarperfil'));

include template($_SESSION['template_base']);