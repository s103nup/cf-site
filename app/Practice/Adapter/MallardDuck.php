<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Duck;
use App\Practice\Helper;

class MallardDuck implements Duck
{
    use Helper;

    public function fly(): void
    {
        $this->echoWithEol('I\'m flying');
    }

    public function quack(): void
    {
        $this->echoWithEol('Quack');
    }
}