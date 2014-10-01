<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

$amigos = True;

$contenido = get_include_contents(template('amigos'));

include template($_SESSION['template_base']);