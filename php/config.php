<?php

global $config;
$config = array();

// parametros grales
$config['path'] = '/var/www/php';
$config['defaultView'] = 'login';
$config['defaultLoggedView'] = 'novedades';

// base de datos
$config['dbhost']="127.0.0.1";
$config['dbport']=3306;
$config['dbsocket']="";
$config['dbuser']="root";
$config['dbpassword']="2422db50d";
$config['dbname']="friendbook";


// vistas que no requieren login
$vistasPublicas = array(
    '/login',
    '/registro',
);

// autodeteccion del template si hay sesion o no
if (isset($_SESSION['logueado'])) {
    $_SESSION['template_base'] = 'base';
} else {
    $_SESSION['template_base'] = 'base_logout';
}