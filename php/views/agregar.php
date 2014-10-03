<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$usuario_id = trim($params[0]);

if ($usuario_id!='') {
    $query = "INSERT INTO Amigo(usuario_id, usuario_solicitado) VALUES (?, ?);";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('ii', $_SESSION['usrId'], $usuario_id);
        $stmt->execute();

        if ($stmt->affected_rows!=1) {
            $stmt->close();
            header('location: /500');
        }

        @$stmt->close();
        header('location: /amigos');
    } else {
      header('location: /500');
    }
} else {
    header('location: /amigos');
}