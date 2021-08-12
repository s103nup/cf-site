<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\Beverage;

class Espresso extends Beverage
{
    public function __construct()
    {
        $this->description = 'Espresso';
    }

    public function cost(): float
    {
        return 0.2;
    }
}
