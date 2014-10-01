<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');


$contenido = get_include_contents(template('registro'));
$js = get_include_contents(javascript('registro'));


include template($_SESSION['template_base']);