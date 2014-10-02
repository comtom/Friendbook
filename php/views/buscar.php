<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$busqueda = (!empty($_POST['texto'])) ? mysqli_real_escape_string($con, $_POST['texto']): '';
$contenido = '';

if ($busqueda!='') {
  $busqueda = '%'. $busqueda .'%';

  $query = "CALL buscarMuro(?);";
  if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('s', $busqueda);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $fecha, $texto, $titulo, $link, $foto, $usuario_id, $usuario, $nombre, $apellido);
    global $posts;
    $posts = array();

    while ($stmt->fetch()) {
        $post = new stdClass();
        $post->id = $id;
        $post->fecha = fechahoraDisplay($fecha);
        $post->texto = $texto;
        //$post->titulo = $titulo;
        //$post->link = $link;
        //$post->foto = $foto;
        $post->usuario_id = $usuario_id;
        $post->usuario = $usuario;
        $post->nombre = $nombre;
        $post->apellido = $apellido;

        array_push($posts, $post);
    }
    $stmt->close();

    $query = "CALL buscarUsuario(?);";
    if ($stmt = $con->prepare($query)) {
      $stmt->bind_param('s', $busqueda);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id, $usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);
      global $amigos;
      $amigos = array();

      while ($stmt->fetch()) {
          $amigo = new stdClass();
          $amigo->id = $id;
          $amigo->usuario = $usuario;
          $amigo->nombre = $nombre;
          $amigo->apellido = $apellido;
          $amigo->genero = getGenero($genero);
          $amigo->fecha_nacimiento = fechaDisplay($fecha_nacimiento);
          $amigo->nacionalidad = $nacionalidad;
          $amigo->email = $email;

          array_push($amigos, $amigo);
      }
      $stmt->close();

    $contenido = get_include_contents(template('buscar'));
    } else {
      header('location: /500.php');
    }
  } else {
    header('location: /500.php');
  }
}

include template($_SESSION['template_base']);