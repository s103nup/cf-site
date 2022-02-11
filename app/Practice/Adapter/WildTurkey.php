<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Turkey;
use App\Practice\Helper;

class WildTurkey implements Turkey
{
    use Helper;
    
    public function fly(): void
    {
        $this->echoWithEol('I\'m flying a short distance');
    }
    
    public function gobble(): void
    {
        $this->echoWithEol('Gobble gobble');
    }
}