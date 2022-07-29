<?php

require_once realpath("vendor/autoload.php");

if (PHP_SAPI == 'cli'){
    $out = "Bienvenido a interface CLI \n";
    $out .= "---------------------------------\n";
    $out .= "- Seleccione proceso a ejecutar -\n";
    $out .= "---------------------------------\n"; 

    echo $out;

    $app = new Roanja\Joseluis\Controller\GeometricProgressionsController();
    $app->init(new Roanja\Joseluis\Controller\PrimeraController);
    $app->init(new Roanja\Joseluis\Controller\SegundaController);
    $app->init(new Roanja\Joseluis\Controller\TerceraController);

    $app->selectProcess();

} else {
    echo 'Aplicación de uso en php CLI';
}