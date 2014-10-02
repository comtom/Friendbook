<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$comando = trim($params[0]);
$texto = (!empty($_POST['q'])) ? mysqli_real_escape_string($con, $_POST['q']): '';
$limite = (!empty($_POST['page_limit'])) ? mysqli_real_escape_string($con, $_POST['page_limit']): '';
$error = '';

if ($comando!='') {
    switch ($comando) {
    case 'usuarios':
        $query = "SELECT id,nombre,apellido,usuario FROM Usuario WHERE nombre like %?% or apellido like %?% or usuario like %?% limit ?;";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param('s', $texto);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $nombre, $apellido, $usuario, $limite);
            $resultado = array();

            while ($stmt->fetch()) {
                $amigo = new stdClass();
                $amigo->id = $id;
                $amigo->usuario = $usuario;
                $amigo->nombre = $nombre;
                $amigo->apellido = $apellido;

                array_push($resultado, $amigo);
            }
            $stmt->close();
        } else {
            $error = 'Error de consulta SQL.';
        }
    break;
    
    default:
        header('location: /500');
    break;
    }

    array_push($respuesta, $resultado);
    array_push($respuesta, $error);
    echo json_encode($respuesta);
} else {
    header('location: /500');
}