<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$contenido = '';

$query = "CALL getNovedades(?);";
if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('i', $_SESSION['usrId']);
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

    $contenido = get_include_contents(template('novedades'));
    $contenido.= get_include_contents(template('cargarmas'));
    $stmt->close();
} else {
  header('location: /500.php');
}

$novedades = True;
include template($_SESSION['template_base']);