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
    $q = explode('/', $query['path']);

    if (count($q)==1) {
        $view = $q[2];
    } else {
        $view = $q[1];
    }
} else {
    $view = '';
}

global $params;
$params = array();
$j = 1;

for ($i=2; $i<=5; $i++) {
    if (isset($q[$i])){
        array_push($params, $q[$i]);
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
        //header('location: /404');
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