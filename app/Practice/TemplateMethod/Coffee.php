<?php
namespace App\Practice\TemplateMethod;

use App\Practice\Helper;
use App\Practice\TemplateMethod\CaffieineBeverage;

class Coffee extends CaffieineBeverage
{
    use Helper;

    protected function brew(): void
    {
        $this->echoWithEol('Dripping Coffee through filter');
    }

    protected function addCondiments(): void
    {
        $this->echoWithEol('Adding Sugar and Milk');
    }
}
