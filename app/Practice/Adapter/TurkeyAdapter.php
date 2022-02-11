<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Duck;
use App\Practice\Adapter\Interfaces\Turkey;

class TurkeyAdapter implements Duck
{
    /**
     * Turkey
     *
     * @var Turkey
     */
    private $turkey;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    public function fly(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->turkey->fly();
        }
    }

    public function quack(): void
    {
        $this->turkey->gobble();
    }
}