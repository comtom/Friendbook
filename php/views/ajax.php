<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$comando = trim($params[0]);
$texto = (!empty($_POST['q'])) ? mysqli_real_escape_string($con, $_POST['q']): '';
$limite = (!empty($_POST['page_limit'])) ? mysqli_real_escape_string($con, $_POST['page_limit']): '';
$respuesta = array();
$error = '';

if ($comando!='') {
    $texto = '%'. $texto .'%';

    switch ($comando) {
        case 'usuarios':
            $query = "CALL buscarUsuario(?);";
            if ($stmt = $con->prepare($query)) {
                $stmt->bind_param('s', $texto);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);
                $resultado = array();

                while ($stmt->fetch()) {
                    $amigo = new stdClass();
                    $amigo->id = $id;
                    $amigo->usuario = $usuario;
                    $amigo->nombre = $nombre .' '. $apellido;

                    array_push($resultado, $amigo);
                }
                $stmt->close();
            } else {
                $error = 'Error de consulta SQL.';
            }
        break;
        case 'amigos':
            $query = "CALL buscarAmigo(?);";
            if ($stmt = $con->prepare($query)) {
                $stmt->bind_param('s', $texto);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);
                $resultado = array();

                while ($stmt->fetch()) {
                    $amigo = new stdClass();
                    $amigo->id = $id;
                    $amigo->usuario = $usuario;
                    $amigo->nombre = $nombre .' '. $apellido;

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

    header('Content-Type: application/json;');
    $respuesta = array('resultado' => $resultado);
    //array_push($respuesta, array('error' => $error));
    echo json_encode($respuesta);
} else {
    header('location: /500');
}