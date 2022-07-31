<?php

namespace Roanja\Joseluis\Module;

use Roanja\Joseluis\Controller\ModuleController;
use Roanja\Joseluis\Interface\ModuleInterface;

class TercerModule extends ModuleController implements ModuleInterface
{

    public $valueInit;
    public $valueMax;
    public $valueRazon;

    public function __construct()
    {
        $this->title =  "3. Progresiones geométricas";
        $this->description =  "Calculada según los parámetros dados desde línea de comandos
        que serán los siguientes: (Valor inicial, Razón, Valor máximo)";
    }

    /**
     * Setea el valor inicial
     *
     * @return void
     */
    private function setValueInit(): void
    {

        $this->message('enter the initial term in numeric format', 'i');
        $this->valueInit = $this->enterValueFloat();
    }

    /**
     * Setea el valor máximo
     *
     * @return void
     */
    private function setValueMax(): void
    {
        $this->message('enter the maximum value to process in numeric format', 'i');
        $this->valueMax = $this->enterValueFloat();
    }

    /**
     * Setea el valor de razón
     *
     * @return void
     */
    private function setValueRazon(): void
    {
        $this->message('enter the value of the reason to process in numeric format', 'i');
        $this->valueRazon = $this->enterValueFloat();
    }

    /**
     * Recibe los datos introducidos por CLI
     *
     * @return string | exit
     */
    private function enterValueFloat(): float
    {
        $value = (float)trim(fgets(STDIN));
        $cont = 0;

        while (!$this->validatedateFormat($value))
        {
            if($cont == 2){
                $this->message('you have exceeded the number of attempts thanks');
                exit;
            }
            $value = (float)trim(fgets(STDIN));
            $cont++;
        }

        return $value;
    }

    /**
     * Valida el formato numérico diferente de 0
     *
     * @param float|null $value
     * @return boolean
     */
    private function validatedateFormat(float $value = null): bool
    {
        if(!is_numeric($value) || $value == 0) {
            $this->message('The date format is not correct ' . $value);
            $this->message('the format numeric > 0');
            return false;
        }

        return true;
    }

    /**
     * Imprime en CLI values a procesar
     *
     * @return void
     */
    private function printInfoData(): void
    {
        $this->message('PARAMS', 'i');
        $this->message('- Init: ' . $this->valueInit);
        $this->message('- Razon: ' . $this->valueRazon);
        $this->message('- Max: ' . $this->valueMax);
        $this->ln();
    }

    /**
     * Ejecuta el calculo de los datos
     *
     * @return void
     */
    private function getCalculations(): void
    {
        $this->message('Results', 's');
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

        $this->setValueInit();
        $this->setValueRazon();
        $this->setValueMax();
        $this->ln();
        $this->printInfoData();
        $this->getCalculations();
    }
}