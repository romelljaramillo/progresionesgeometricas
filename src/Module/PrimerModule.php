<?php

namespace Roanja\Joseluis\Module;

use Roanja\Joseluis\Controller\ModuleController;
use Roanja\Joseluis\Interface\ModuleInterface;

class PrimerModule extends ModuleController implements ModuleInterface
{
    public $valueInit;
    public $valueMax;
    public $valueRazon;

    public function __construct()
    {
        $this->valueInit = 3;
        $this->valueMax = 1000;
        $this->valueRazon = 2.5;

        $this->title =  "1. Progresiones geométricas";
        $this->description =  'Comenzará en ' .$this->valueInit . ', su razón será ' . $this->valueRazon .' y su último valor no debe sobrepasar el ' .$this->valueMax;

    }
    
    /**
     * Ejecuta el proceso seleccionado
     *
     * @return void
     */
    public function process(): void
    {
        parent::process();
        $this->printInfoData();
        $this->getCalculations();
    }

    /**
     * Imprime en CLI values a procesar
     *
     * @return void
     */
    public function printInfoData(): void
    {
        $this->message('PARAMS');
        $this->message('- Init: ' . $this->valueInit);
        $this->message('- Razon: ' . $this->valueRazon);
        $this->message('- Max: ' . $this->valueMax);
        $this->ln();
    }

    public function getCalculations(): void
    {
        $this->message('Results');
        $this->ln();

        $resp = $this->valueInit;
        
        while ($resp < $this->valueMax) {
            $message = '';
            $message = $resp . ' * ' . $this->valueRazon . ' = ';
            $resp = $resp * $this->valueRazon;
            $message .= $resp;

            if($resp <= $this->valueMax)
                $this->message($message);
        }
    }
}