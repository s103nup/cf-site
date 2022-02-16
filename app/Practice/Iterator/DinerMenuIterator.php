<?php

namespace App\Practice\Iterator;

use Exception;
use App\Practice\Iterator\Iterator;

class DinerMenuIterator implements Iterator
{
    /**
     * Items
     *
     * @var array
     */
    private $items;

    private $position = 0;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function hasNext(): bool
    {
        if ($this->position >= count($this->items) || is_null($this->items[$this->position])) {
            return false;
        } else {
            return true;
        }
    }

    public function next()
    {
        $item = $this->items[$this->position];
        $this->position++;
        return $item;
    }

    public function remove(): void
    {
        if ($this->position <= 0) {
            throw new Exception('You can\'t remove an item until you\'ve done at least one next()');
        }
        if (!is_null($this->items[$this->position - 1])) {
            for($i = $this->position -1; $i < count($this->items) - 1; $i++) {
                $this->items[$i] = $this->items[$i + 1];
            }
            $this->items[count($this->items) - 1] = null;
        }
    }
}