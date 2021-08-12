<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Practice\Pattern;

use App\Practice\Decorator\Soy;
use App\Practice\Decorator\Whip;
use App\Practice\Decorator\Mocha;
use App\Http\Controllers\Controller;
use App\Practice\Decorator\Espresso;
use App\Practice\Decorator\DarkRoast;
use App\Practice\Decorator\HouseBlend;

class DecoratorController extends Controller
{
    public function index(): void
    {
        $espresso = new Espresso();
        dump($espresso->getDescription() . ' $' . $espresso->cost());

        $darkRoast = new DarkRoast();
        $darkRoast = new Mocha($darkRoast);
        $darkRoast = new Mocha($darkRoast);
        $darkRoast = new Whip($darkRoast);
        dump($darkRoast->getDescription() . ' $' . $darkRoast->cost());

        $houseBlend = new HouseBlend();
        $houseBlend = new Soy($houseBlend);
        $houseBlend = new Mocha($houseBlend);
        $houseBlend = new Whip($houseBlend);
        dump($houseBlend->getDescription() . ' $' . $houseBlend->cost());
    }
}
