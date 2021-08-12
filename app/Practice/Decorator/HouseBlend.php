<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

class HouseBlend extends Beverage
{
    public function __construct()
    {
        $this->description = 'House Blend Coffee';
    }

    public function cost(): float
    {
        return 0.89;
    }
}
