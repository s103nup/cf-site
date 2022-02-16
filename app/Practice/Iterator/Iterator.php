<?php

namespace App\Practice\Iterator;

interface Iterator
{
    public function hasNext(): bool;
    public function next();
    public function remove(): void;
}