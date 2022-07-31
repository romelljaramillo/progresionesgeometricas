<?php

namespace Roanja\Joseluis\Module;

use Roanja\Joseluis\Controller\ModuleController;
use Roanja\Joseluis\Interface\ModuleInterface;

class SegundoModule extends ModuleController implements ModuleInterface
{
    public $valueInit;
    public $valueMax;
    public $valueRazon;

    public function __construct()
    {
        $this->valueInit = 10;
        $this->valueMax = 1500;
        $this->valueRazon = 1.75;

        $this->title =  "2. Progresiones geométricas";
        $this->description =  'Comenzará en ' .$this->valueInit . ', su razón será ' . $this->valueRazon .' y su último valor no debe sobrepasar el ' .$this->valueMax;
    }

    /**
     * Imprime en CLI values a procesar
     *
     * @return void
     */
    public function printInfoData()
    {
        $this->message('PARAMS');
        $this->message('- Init: ' . $this->valueInit);
        $this->message('- Razon: ' . $this->valueRazon);
        $this->message('- Max: ' . $this->valueMax);
        $this->ln();
    }

    public function getCalculations()
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
}