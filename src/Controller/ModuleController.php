<?php

namespace Roanja\Joseluis\Controller;

class ModuleController
{

    public $title;
    public $description;

    public function __construct()
    {
        $this->title = 'There is no title';
        $this->description = 'There is no description';
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function process(): void
    {
        $this->message('Title: ' . $this->getTitle());
        $this->message('Description: ' . $this->getDescription());
        $this->ln();
    }


    public function message(string $message = '', string $type = '')
    {
        switch ($type) {
            case 'success':
                echo "\033[32m" . $message . "\033[0m\n";
                break;
            case 'error':
                echo "\033[31m" . $message . "\033[0m\n";
                break;
            case 'info':
                echo "\033[33m" . $message . "\033[0m\n";
                break;
            case 'warning':
                echo "\033[36m" . $message . "\033[0m\n";
                break;
            default:
                echo $message . "\n";
                break;
        }
    }

    public function ln()
    {
        echo "-----------------------------------\n";
    }
}