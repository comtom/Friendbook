<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$solicitud_id = trim($params[0]);

if ($solicitud_id!='') {
    $query = "CALL confirmarSolicitud(?, ?);";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('ii', $_SESSION['usrId'], $solicitud_id);
        $stmt->execute();

        if ($stmt->affected_rows!=1) {
            $stmt->close();
            header('location: /500');
        }
        $stmt->close();
    }
}
header('location: '. $_SERVER['HTTP_REFERER']);