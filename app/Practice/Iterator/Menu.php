<?php

namespace App\Practice\Iterator;

use App\Practice\Iterator\Iterator;

interface Menu
{
    public function createIterator(): Iterator;
}