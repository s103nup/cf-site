<?php

namespace App\Practice\Iterator;

use Exception;
use App\Practice\Iterator\Menu;
use App\Practice\Iterator\Iterator;
use App\Practice\Iterator\DinerMenu;
use App\Practice\Iterator\PancakeHouseMenu;

class Menus implements Iterator
{
    protected $menuItems;

    protected $position = 0;

    public function __construct()
    {
        $this->menuItems = collect([]);

        $this->addItem(new PancakeHouseMenu());
        $this->addItem(new DinerMenu());
    }

    public function addItem(Menu $item): void
    {
        $this->menuItems->push($item->createIterator());
    }

    public function hasNext(): bool
    {
        if ($this->menuItems->count() <= $this->position || is_null($this->menuItems->get($this->position))) {
            return false;
        } else {
            return true;
        }
    }

    public function next()
    {
        $menu = $this->menuItems->get($this->position);
        $this->position++;
        return $menu;
    }

    public function remove(): void
    {
        throw new Exception('Menus Iterator does not support remove()');
    }

}