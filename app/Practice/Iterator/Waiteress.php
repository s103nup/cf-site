<?php

namespace App\Practice\Iterator;

use App\Practice\Helper;
use App\Practice\Iterator\Menu;

class Waiteress
{
    use Helper;

    /**
     * Pancake house menu
     *
     * @var Menu
     */
    private $pancakeHouseMenu;

    /**
     * Diner menu
     *
     * @var Menu
     */
    private $dinerMenu;

    public function __construct(Menu $pancakeHouseMenu, Menu $dinerMenu)
    {
        $this->pancakeHouseMenu = $pancakeHouseMenu;
        $this->dinerMenu = $dinerMenu;
    }

    public function printMenus()
    {
        $pancakeIterator = $this->pancakeHouseMenu->createIterator();
        $dinerIterator = $this->dinerMenu->createIterator();
        $this->echoWithEol($this->appendEol('MENU') . $this->appendEol('----') . 'BREAKFAST');
        $this->printMenu($pancakeIterator);
        $this->echoWithEol('LUNCH');
        $this->printMenu($dinerIterator);
    }

    public function printMenu(Iterator $iterator): void
    {
        while ($iterator->hasNext()) {
            $item = $iterator->next();
            $row = $item->get('name') . ', ' . $item->get('price') . ' -- ' . $item->get('desc');
            $this->echoWithEol($row);
        }
    }
}