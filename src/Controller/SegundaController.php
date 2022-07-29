<?php

namespace Roanja\Joseluis\Controller;

use Roanja\Joseluis\Interface\GeometricProgressionsInterface;

class SegundaController extends GeometricProgressionsController implements GeometricProgressionsInterface
{
    public function __construct()
    {
        $this->valueInit = 10;
        $this->valueMax = 1500;
        $this->valueRazon = 1.75;

        $this->title =  "Process 1";
        $this->description =  'La segunda comenzará en ' .$this->valueInit . ', su razón será ' . $this->valueRazon .' y su último valor no debe sobrepasar el ' .$this->valueMax;
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
        $this->message($this->description);
        parent::process();
    }
}