<?php

namespace App\Practice\Iterator;

use App\Practice\Iterator\Menu;
use Illuminate\Support\Collection;
use App\Practice\Iterator\Iterator;

class PancakeHouseMenu implements Menu
{
    /**
     * Menu items
     *
     * @var Collection
     */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = collect([]);

        $this->addItem(
            'K&B\'s Pancake Breakfast',
            'Pancakes with scrambled eggs, and toast',
            true,
            2.99
        );
        $this->addItem(
            'Regular pancake Breakfast',
            'Pancakes with fried eggs, sausage',
            false,
            2.99
        );
        $this->addItem(
            'Blueberry Pancakes',
            'Pancakes made with fresh blueberries',
            true,
            3.49
        );
        $this->addItem(
            'Waffles',
            'Waffles, with your choice of blueberries or strawberries',
            true,
            3.59
        );
    }

    public function addItem(string $name, string $desc, bool $vegetarian, float $price): void
    {
        $item = collect(compact(['name', 'desc', 'vegetarian', 'price']));
        $this->menuItems->push($item);
    }

    public function createIterator(): Iterator
    {
        return new PancakeHouseMenuIterator($this->menuItems);
    }
}
