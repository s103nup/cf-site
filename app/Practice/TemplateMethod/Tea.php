<?php
namespace App\Practice\TemplateMethod;

use App\Practice\Helper;
use App\Practice\TemplateMethod\CaffieineBeverage;

class Tea extends CaffieineBeverage
{
    use Helper;

    protected function brew(): void
    {
        $this->echoWithEol('Steeping the Tea');
    }

    protected function addCondiments(): void
    {
        $this->echoWithEol('Adding Lemon');
    }
}
