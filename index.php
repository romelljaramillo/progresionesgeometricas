<?php

require_once realpath("vendor/autoload.php");

if (PHP_SAPI == 'cli'){
    $out = "Bienvenido a interface CLI \n";
    $out .= "---------------------------------\n";
    $out .= "- Seleccione proceso a ejecutar -\n";
    $out .= "---------------------------------\n"; 

    echo $out;

    $app = new Roanja\Joseluis\Controller\GeometricProgressionsController();

    $app->init();

} else {
    echo 'Aplicación de uso en php CLI';
}