<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

global $params;
$usuario_id = trim($params[0]);

if ($usuario_id!='') {

    $query = "CALL getPerfilPerms(?, ?);";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('ii', $_SESSION['usrId'], $usuario_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $usuario, $nombre, $apellido, $genero, $fecha_nacimiento, $nacionalidad, $email);

        if ($stmt->num_rows()>0) {
            $stmt->fetch();
            global $perfil;
            $perfil = new stdClass();
            $perfil->id = $id;
            $perfil->usuario = $usuario;
            $perfil->nombre = $nombre;
            $perfil->apellido = $apellido;
            $perfil->genero = getGenero($genero);
            $perfil->nacionalidad = $nacionalidad;
            $perfil->fecha_nacimiento = fechaDisplay($fecha_nacimiento);
            $perfil->email = $email;
        }
        $stmt->close();

        global $posts;
        $posts = array();

        if ( isset($perfil->id) or $usuario_id==$_SESSION['usrId']) {
            $query_pubs = "SELECT M.fecha, M.texto, M.titulo, M.link, M.foto, U.id, U.usuario, U.nombre, U.apellido FROM Muro M
                JOIN Usuario U on U.id=M.usuario_id
                WHERE M.usuario_destinatario=? ORDER BY M.id desc;";

            if ($stmt_pubs = $con->prepare($query_pubs)) {
                $stmt_pubs->bind_param('i', $usuario_id);
                $stmt_pubs->execute();
                $stmt_pubs->store_result();
                $stmt_pubs->bind_result($fecha, $texto, $titulo, $link, $foto, $usuario_id, $usuario, $nombre, $apellido);

                while ($stmt_pubs->fetch()) {
                    $post = new stdClass();
                    $post->fecha = fechahoraDisplay($fecha);
                    $post->texto = $texto;
                    $post->usuario_id = $usuario_id;
                    $post->usuario = $usuario;
                    $post->nombre = $nombre;
                    $post->apellido = $apellido;
                    //$post->titulo = $titulo;
                    //$post->link = $link;
                    //$post->foto = $foto;
                    array_push($posts, $post);
                }
                $stmt_pubs->close();
            }
        }
    }
    $contenido = get_include_contents(template('verperfil'));
}

include template($_SESSION['template_base']);