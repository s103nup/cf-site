<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\Beverage;

class DarkRoast extends Beverage
{
    public function __construct()
    {
        $this->description = 'Dark Roast';
    }

    public function cost(): float
    {
        return 1.99;
    }
}
