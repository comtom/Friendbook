<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$contenido = '';

$query = "CALL getAmigosDetail(?);";
if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('i', $_SESSION['usrId']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $email);
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
        $amigo->email = $email;
        $amigo->cantidad_amigos = 0;//$cantidad_amigos;

        array_push($amigos, $amigo);
    }
    $stmt->close();
    $contenido = get_include_contents(template('amigos'));

} else {
  header('location: /500');
}

$amigos = True;
include template($_SESSION['template_base']);