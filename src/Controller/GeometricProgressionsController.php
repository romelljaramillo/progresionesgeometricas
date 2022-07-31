<?php

namespace Roanja\Joseluis\Controller;

use Roanja\Joseluis\Interface\ModuleInterface;

class GeometricProgressionsController extends ModuleController
{
    public $idProcess = 0;
    private $process;

    public function init()
    {
        $modules = $this->getModuleProcess();

        if($modules){
            foreach ($modules as $module) {
                $class = 'Roanja\\Joseluis\\Module\\' . $module;
                if(class_exists($class)){
                    $this->initModule(new $class);
                }
            }
            $this->ln();
            $this->selectProcess();
        } else {
            $this->message('There is no process to run');
            exit;
        }
    }

    public function initModule(ModuleInterface $module)
    {
        $this->process[] = $module;

        $i = count($this->process);
        $options  = $i . ".- " . $module->getDescription();
        $this->message($options);
    }


    /**
     * Retorna un array de modulos existentes en la carpeta Modules
     *
     * @return array
     */
    private function getModuleProcess(): array
    {
        $modules = [];
        $dirRaiz = getcwd();
        $dir = $dirRaiz . '/src/Module';
        $files  = scandir($dir);

        foreach ($files as $value) {
            if(strstr($value, 'Module')){
                $modules[] = str_replace('.php', '',$value);
            }
        }

        return $modules;
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
        
        $this->ln();
        $this->message('The selected option: ' . $this->idProcess);
        $this->ln();
        
        $cont = 0;
        
        while(!$this->validateSelectProcess($this->idProcess)){
            if($cont == 2){
                $this->message('You have exceeded the number of attempts thanks', 'info');
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
            $this->message("The entered value is not correct, please try again", 'error');
            return false;
        }

        $idProcess = $idProcess - 1;
        if(!in_array($idProcess, array_keys ($this->process), true)) {
            $this->message("The value is not in the list, try again", 'error');
            return false;
        }

        return true;
    }
}