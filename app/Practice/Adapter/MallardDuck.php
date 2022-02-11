<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Duck;

class MallardDuck implements Duck
{
    public function fly(): void
    {
        dump('I\'m flying');
    }

    public function quack(): void
    {
        dump('Quack');
    }
}