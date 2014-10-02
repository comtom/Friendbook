<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$query = "CALL getSolicitudes(?);";
if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('i', $_SESSION['usrId']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $usuario_id, $usuario, $nombre, $apellido);

    global $cant_solicitudes;
    global $solicitudes;
    $cant_solicitudes = 0;
    $solicitudes = array();

    while ($stmt->fetch()) {
        $cant_solicitudes++;
        $solicitud = new stdClass();

        $solicitud->id = $id;
        $solicitud->usuario_id = $usuario_id;
        $solicitud->usuario = $usuario;
        $solicitud->nombre = $nombre;
        $solicitud->apellido = $apellido;

        array_push($solicitudes, $solicitud);
    }
    $stmt->close();

}