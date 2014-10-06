<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$usuario_destinatario = (!empty($_POST['usuario_destinatario'])) ? mysqli_real_escape_string($con, $_POST['usuario_destinatario']): '';
$texto = (!empty($_POST['texto'])) ? mysqli_real_escape_string($con, $_POST['texto']): '';

if ($usuario_destinatario!='' and $texto!='') {
    $query = "CALL setMuro(?, ?, ?, NULL, NULL, NULL);";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('iis', $_SESSION['usrId'], $usuario_destinatario, $texto);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->affected_rows==1) {
          header('location: /novedades');
        } else {
          $mensajeError = 'No pudimos guardar tu publicaci&oacute;n, por favor intenta nuevamente m&aacute;s tarde.';
        }

        $stmt->close();
    }
}

$publicar = True;
$contenido = get_include_contents(template('publicar'));
$js = get_include_contents(javascript('publicar'));

include template($_SESSION['template_base']);