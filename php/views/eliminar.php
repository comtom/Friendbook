<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$usuario_id = trim($params[0]);

if ($usuario_id!='') {
    $query = "DELETE FROM Amigo WHERE estado=2 and ((usuario_id=? and usuario_solicitado=?) or (usuario_id=? and usuario_solicitado=?));";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('iiii', $_SESSION['usrId'], $usuario_id, $usuario_id, $_SESSION['usrId']);
        $stmt->execute();

        if ($stmt->affected_rows!=1) {
            $stmt->close();
            header('location: /500');
        }
        $stmt->close();
        header('location: /amigos');
    } else {
      header('location: /500');
    }
} else {
    header('location: /amigos');
}
