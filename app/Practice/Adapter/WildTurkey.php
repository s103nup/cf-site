<?php

namespace App\Practice\Adapter;

use App\Practice\Adapter\Interfaces\Turkey;

class WildTurkey implements Turkey
{
    public function fly(): void
    {
        dump('I\'m flying a short distance');
    }
    
    public function gobble(): void
    {
        dump('Gobble gobble');
    }
}