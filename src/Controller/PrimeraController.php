<?php

namespace Roanja\Joseluis\Controller;

use Roanja\Joseluis\Interface\GeometricProgressionsInterface;

class PrimeraController extends GeometricProgressionsController implements GeometricProgressionsInterface
{
    public function __construct()
    {
        $this->valueInit = 3;
        $this->valueMax = 1000;
        $this->valueRazon = 2.5;

        $this->title =  "Process 1";
        $this->description =  'La primera comenzará en ' .$this->valueInit . ', su razón será ' . $this->valueRazon .' y su último valor no debe sobrepasar el ' .$this->valueMax;

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