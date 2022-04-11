<?php

namespace App\Practice\Iterator;

use App\Practice\Helper;
use App\Practice\Iterator\Iterator;

class Waitress
{
    use Helper;

    /**
     * Menus
     *
     * @var Iterator
     */
    protected $menus;

    public function __construct(Iterator $menus)
    {
        $this->menus = $menus;
    }

    public function printMenus()
    {
        while ($this->menus->hasNext()) {
            $menu = $this->menus->next();
            $this->printMenu($menu);
        }
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