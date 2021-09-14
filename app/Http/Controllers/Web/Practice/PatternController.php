<?php

namespace App\Http\Controllers\Web\Practice;

use App\Practice\Decorator\Soy;
use App\Practice\Decorator\Whip;
use App\Practice\Decorator\Mocha;
use App\Http\Controllers\Controller;
use App\Practice\Decorator\Espresso;
use App\Practice\Decorator\DarkRoast;
use App\Practice\Singleton\Singleton;
use App\Practice\Decorator\HouseBlend;
use App\Practice\Observer\WeatherData;
use App\Practice\Factory\Creator\NyPizzaStore;
use App\Practice\Observer\CurrentDetailDisplay;
use App\Practice\Factory\Creator\ChicagoPizzaStore;
use App\Practice\Observer\CurrentConditionsDisplay;
use App\Practice\AbstractFactory\Factory\NyPizzaStore as NewNyPizzaStore;
use App\Practice\AbstractFactory\Factory\ChicagoPizzaStore as NewChicagoPizzaStore;

class PatternController extends Controller
{
    public function abstractFactory(): void
    {
        dump('Abstract Factory Pattern');
        $nyStore = new NewNyPizzaStore();
        $chicagoStore = new NewChicagoPizzaStore();

        $nyCheesePizza = $nyStore->orderPizza('cheese');
        dump('Ethen order a ' . $nyCheesePizza->getName());

        $chicagoCheesePizza = $chicagoStore->orderPizza('cheese');
        dump('Joel ordered a ' . $chicagoCheesePizza->getName());
    }

    public function decorator(): void
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

    public function factory(): void
    {
        dump('Factory Pattern');
        $nyStore = new NyPizzaStore();
        $chicagoStore = new ChicagoPizzaStore();

        $nyCheesePizza = $nyStore->orderPizza('cheese');
        dump('Ethen order a ' . $nyCheesePizza->getName());

        $chicagoCheesePizza = $chicagoStore->orderPizza('cheese');
        dump('Joel ordered a ' . $chicagoCheesePizza->getName());
    }

    public function observer(): void
    {
        $weatherData = app(WeatherData::class);
        $currentConditionsDisplay = new CurrentConditionsDisplay($weatherData);
        $currentDetailDisplay = new CurrentDetailDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
    }

    public function singleton(): void
    {
        $instance01 = Singleton::getInstance();
        $instance01->printId();
        $instance02 = Singleton::getInstance();
        $instance02->printId();
    }
}
