<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Duck;
use App\Practice\Adapter\Interfaces\Turkey;

class DuckAdapter implements Turkey
{
    /**
     * Duck
     *
     * @var Duck
     */
    private $duck;

    public function __construct(Duck $duck)
    {
        $this->duck = $duck;
    }

    public function fly(): void
    {
        $this->duck->fly();
    }
    
    public function gobble(): void
    {
        $this->duck->quack();
    }
}