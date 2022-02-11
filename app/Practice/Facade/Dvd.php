<?php

namespace App\Practice\Facade;

use App\Practice\Helper;

class Dvd
{
    use Helper;

    public function off(): void
    {
        $this->echoWithEol('DVD off');
    }

    public function on(): void
    {
        $this->echoWithEol('DVD on');
    }
}