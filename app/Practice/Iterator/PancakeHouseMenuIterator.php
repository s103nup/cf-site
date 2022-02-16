<?php

namespace App\Practice\Iterator;

use Exception;
use Illuminate\Support\Collection;
use App\Practice\Iterator\Iterator;

class PancakeHouseMenuIterator implements Iterator
{
    /**
     * Items
     *
     * @var Collection
     */
    private $items;

    private $position = 0;

    public function __construct(Collection $items)
    {
        $this->items = $items;
    }

    public function hasNext(): bool
    {
        if ($this->position >= $this->items->count() || is_null($this->items->get($this->position))) {
            return false;
        } else {
            return true;
        }
    }

    public function next()
    {
        $item = $this->items->get($this->position);
        $this->position++;
        return $item;
    }

    public function remove(): void
    {
        if ($this->position <= 0) {
            throw new Exception('You can\'t remove an item until you\'ve done at least one next()');
        }
        if (!is_null($this->items->get($this->position - 1))) {
            $this->items->pull($this->position - 1);
        }
    }
}