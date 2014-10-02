<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$texto = (!empty($_POST['texto'])) ? mysqli_real_escape_string($con, $_POST['texto']): '';
$contenido = '';

if ($nombre!='') {
  $query = "CALL buscarMuro(?);";
  if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('s', $texto);
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
        $post->titulo = $titulo;
        $post->link = $link;
        $post->foto = $foto;
        $post->usuario_id = $usuario_id;
        $post->usuario = $usuario;
        $post->nombre = $nombre;
        $post->apellido = $apellido;

        array_push($posts, $post);
    }
    $stmt->close();

    $query = "CALL buscarUsuario(?);";
    if ($stmt = $con->prepare($query)) {
      $stmt->bind_param('s', $texto);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id, $usuario, $nombre, $apellido);
      global $usuarios;
      $usuarios = array();
      
      while ($stmt->fetch()) {
          $usuario = new stdClass();
          $usuario->id = $id;
          $usuario->usuario = $usuario;
          $usuario->nombre = $nombre;
          $usuario->apellido = $apellido;

          array_push($usuarios, $usuario);
      }
      $stmt->close();

    $contenido = get_include_contents(template('buscar'));
  } else {
    header('location: /500.php');
  }
}

include template($_SESSION['template_base']);