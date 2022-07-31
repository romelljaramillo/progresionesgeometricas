<?php

namespace Roanja\Joseluis\Interface;

interface ModuleInterface
{
    public function __construct();
    public function getTitle(): string;
    public function getDescription(): string;
    public function process(): void;
}