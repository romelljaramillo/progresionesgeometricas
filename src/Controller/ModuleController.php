<?php

namespace Roanja\Joseluis\Controller;

/**
 * Clase parent de las que heredan los modulos
 */
class ModuleController
{

    /**
     * Nombre del modulo
     *
     * @var string
     */
    public $title;

    /**
     * Descripción del modulo
     *
     * @var string
     */
    public $description;

    public function __construct()
    {
        $this->title = 'There is no title';
        $this->description = 'There is no description';
    }

    /**
     * Devuelve el titulo
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Devuelve la descripción
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Ejecuta el proceso seleccionado
     *
     * @return void
     */
    public function process(): void
    {
        $this->message('Title: ' . $this->getTitle());
        $this->message('Description: ' . $this->getDescription());
        $this->ln();
    }

    /**
     * Imprime salida de texto
     *
     * @param string $message
     * @param string $type s=> success, e => error, i => info, W => warning
     * @return void
     */
    public function message(string $message = '', string $type = '')
    {
        switch ($type) {
            case 's':
                echo "\033[32m" . $message . "\033[0m\n";
                break;
            case 'e':
                echo "\033[31m" . $message . "\033[0m\n";
                break;
            case 'i':
                echo "\033[36m" . $message . "\033[0m\n";
                break;
            case 'w':
                echo "\033[33m" . $message . "\033[0m\n";
                break;
            default:
                echo $message . "\n";
                break;
        }
    }

    /**
     * Imprime lineas
     *
     * @return void
     */
    public function ln()
    {
        echo "-----------------------------------\n";
    }
}