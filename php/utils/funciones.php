<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');


function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return false;
}


function template($nombre) {
    global $config;
    return $config['path'].'/templates/'. $nombre .'.php';
}

function javascript($nombre) {
    global $config;
    return $config['path'].'/templates/js/'. $nombre .'.php';
}


function view($nombre) {
    global $config;
    return $config['path'].'/views/'. $nombre .'.php';
}