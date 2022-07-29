<?php

namespace Roanja\Joseluis\Controller;

use Roanja\Joseluis\Interface\GeometricProgressionsInterface;

class TerceraController extends GeometricProgressionsController implements GeometricProgressionsInterface
{

    public function __construct()
    {
        $this->title =  "Process 3";
        $this->description =  "La tercera será calculada por el mismo proceso según los parámetros dados desde línea de comandos
        que serán los siguientes: (Valor inicial, Razón, Valor máximo)";
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * Ejecuta el proceso seleccionado
     *
     * @return void
     */
    public function process()
    {
        $this->message($this->getDescription());
        parent::process();
    }
}