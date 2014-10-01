<?php
if (!isset($config['path'])) exit('Por motivos de seguridad, no podes acceder directamente');

unset($_SESSION['logueado']);
session_destroy();

header('location: /login');