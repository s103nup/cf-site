<?php

namespace App\Practice\Iterator;

use App\Practice\Helper;
use App\Practice\Iterator\Menu;
use App\Practice\Iterator\Iterator;

class DinerMenu implements Menu
{
    use Helper;

    private const MAX_ITEMS = 6;

    private $numberOfItems = 0;

    /**
     * Menu items
     *
     * @var array
     */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = array_fill(0, $this->numberOfItems, '');

        $this->addItem(
            'Vegetarian BLT',
            '(Fakin\') Bacon with lettuce & tomato on whole wheat',
            true,
            2.99
        );
        $this->addItem(
            'BLT',
            'Bacon with lettuce & tomato on whole wheat',
            false,
            2.99
        );
        $this->addItem(
            'Soup of the day',
            'Soup of th day, with a side of potato salad',
            false,
            3.29
        );
        $this->addItem(
            'Hotdog',
            'A hot dog, with saurkraut, relish, onions, topped with cheese',
            false,
            3.05
        );
    }

    public function addItem(string $name, string $desc, bool $vegetarian, float $price): void
    {
        $item = collect(compact(['name', 'desc', 'vegetarian', 'price']));
        if ($this->numberOfItems >= self::MAX_ITEMS) {
            $this->echoWithEol('Sorry, menu is full! Can\'t add item to menu');
        } else {
            $this->menuItems[$this->numberOfItems] = $item;
            $this->numberOfItems++;
        }
    }

    public function createIterator(): Iterator
    {
        return new DinerMenuIterator($this->menuItems);
    }
}
