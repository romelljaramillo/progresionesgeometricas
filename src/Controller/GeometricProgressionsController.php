<?php

namespace Roanja\Joseluis\Controller;

use Roanja\Joseluis\Interface\GeometricProgressionsInterface;

class GeometricProgressionsController
{
    public $title = 'Process';
    public $description = 'Process description';

    public $idProcess = 0;
    private $process;
    public $valueInit;
    public $valueMax;
    public $valueRazon;

    /**
     * Muestra la lista de opciones a seleccionar
     *
     * @param GeometricProgressionsInterface $output
     * @return string
     */
    public function init(GeometricProgressionsInterface $output)
    {
        $this->process[] = $output;

        $i = count($this->process);
        $message  = $i . ".- " . $output->getDescription();
        $this->message($message);
    }

    /**
     * Permite seleccionar un elemento de la lista
     * Valida el valor introducido
     * Ejecuta el proceso perteneciente al valos seleccionado
     *
     * @return void
     */
    public function selectProcess(): void
    {
        $this->idProcess = (int)trim(fgets(STDIN));
        
        $this->message('The selected option: ' . $this->idProcess);
        
        $cont = 0;
        
        while(!$this->validateSelectProcess($this->idProcess)){
            if($cont == 2){
                $this->message('you have exceeded the number of attempts thanks');
                exit;
            }
            $this->idProcess = (int)trim(fgets(STDIN));
            $cont++;
        }

        $this->process[$this->idProcess - 1]->process();
    }

    /**
     * Valida el valor introducido 
     * si es numérico y si hay un proceso a ejecutar
     *
     * @param int $idProcess
     * @return boolean
     */
    public function validateSelectProcess(int $idProcess): bool
    {
        if(!is_numeric($idProcess)){
            echo "The entered value is not correct, please try again \n";
            return false;
        }

        $idProcess = $idProcess - 1;
        if(!in_array($idProcess, array_keys ($this->process), true)) {
            echo "the value is not in the list, try again \n";
            return false;
        }

        return true;
    }

    /**
     * Setea el valor inicial
     *
     * @return void
     */
    public function setValueInit(): void
    {
        if(!$this->valueInit)
        {
            $this->message('enter the initial term in numeric format');
            $this->valueInit = $this->enterValueFloat();
        }
    }

    /**
     * Setea el valor máximo
     *
     * @return void
     */
    public function setValueMax(): void
    {
        if(!$this->valueMax){
            $this->message('enter the maximum value to process in numeric format');
            $this->valueMax = $this->enterValueFloat();
        }
    }

    /**
     * Setea el valor de razón
     *
     * @return void
     */
    public function setValueRazon(): void
    {
        if(!$this->valueRazon){
            $this->message('enter the value of the reason to process in numeric format');
            $this->valueRazon = $this->enterValueFloat();
        }
    }

    /**
     * Recibe los datos introducidos por CLI
     *
     * @return string | exit
     */
    public function enterValueFloat(): float
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

    public function validatedateFormat(float $value = null): bool
    {
        if(!is_numeric($value) || $value == 0) {
            $this->message('The date format is not correct ' . $value);
            $this->message('the format numeric > 0');
            return false;
        }

        return true;
    }

    public function process()
    {
        $this->setValueInit();
        $this->setValueRazon();
        $this->setValueMax();
        $this->printInfoData();
        $this->getCalculations();
    }

    /**
     * Imprime en CLI values a procesar
     *
     * @return void
     */
    public function printInfoData()
    {
        $this->message('value Init: ' . $this->valueInit);
        $this->message('value Razon: ' . $this->valueRazon);
        $this->message('value Max: ' . $this->valueMax);
    }

    public function getCalculations()
    {
        $this->message('Calculations');
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

    public function message(string $message = '')
    {
        echo $message . "\n";
    }
}