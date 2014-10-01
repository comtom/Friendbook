<?php
session_start();

// configuracion
include 'config.php';

// control de errores
include 'utils/errores.php';

// conexion a la base de datos
include 'utils/db.php';

// funciones utiles
include 'utils/funciones.php';

// procesamiento de url
$query = parse_url($_SERVER['REQUEST_URI']);

if (isset($query['query'])) {
    $view = $query['query'];
} elseif (isset($query['path'])) {
    $view = $query['path'];
} else {
    $view = '';
}

$q = explode('/', $query['path']);

$params = array();
$i = 1;

foreach ($q as $parameter) {
    if ($parameter!=$q[1]) {
        $params[$i] = $parameter;
        $i++;
    }
}

// delega responsabilidad a la vista corresp. o muestra error
if (trim($view)=='' or trim($view)=='/') {
    // vista por defecto
    if (isset($_SESSION['logueado'])) {
        $default = $config['defaultLoggedView'];
    } else {
        $default = $config['defaultView'];
    }
    include( view($default) );
} else {
    if (!file_exists( view($view) )) {
        // para produccio, hacer include de 404
        exit('Error: No se pudo cargar el controlador especificado.');
    } else {

        // controla sesion
        if (in_array($view, $vistasPublicas, true) or isset($_SESSION['logueado'])) {
            include( view($view) );
        } else {
            //exit('Error: No puede acceder si no ingresa.');
            include( view($config['defaultView']) );
        }

    }
}

if (isset($error[1])) {
    echo '<br><br><div class="ui page segment"><h2>Error</h2><br>';
    var_dump($error);
    echo '</div>';
}
?>