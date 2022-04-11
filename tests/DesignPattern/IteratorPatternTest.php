<?php

namespace Tests\DesignPattern;

use Tests\TestCase;
use App\Practice\Helper;
use App\Practice\Iterator\Menus;
use App\Practice\Iterator\Waitress;
use App\Practice\Iterator\DinerMenu;
use App\Practice\Iterator\PancakeHouseMenu;

class IteratorPatternTest extends TestCase
{
    use Helper;

    public function testPrintMenu(): void
    {
        $menus = new Menus();
        $waitress = new Waitress($menus);

        $expectRows = [
            'K&B\'s Pancake Breakfast, 2.99 -- Pancakes with scrambled eggs, and toast',
            'Regular pancake Breakfast, 2.99 -- Pancakes with fried eggs, sausage',
            'Blueberry Pancakes, 3.49 -- Pancakes made with fresh blueberries',
            'Waffles, 3.59 -- Waffles, with your choice of blueberries or strawberries',

            'Vegetarian BLT, 2.99 -- (Fakin\') Bacon with lettuce & tomato on whole wheat',
            'BLT, 2.99 -- Bacon with lettuce & tomato on whole wheat',
            'Soup of the day, 3.29 -- Soup of th day, with a side of potato salad',
            'Hotdog, 3.05 -- A hot dog, with saurkraut, relish, onions, topped with cheese',
        ];
        $this->expectOutputString($this->appendEol($expectRows));

        $waitress->printMenus();
    }

}
