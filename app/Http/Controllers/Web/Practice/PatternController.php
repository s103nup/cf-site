<?php

namespace App\Http\Controllers\Web\Practice;

use App\Practice\Command\Tv;
use App\Practice\Command\Light;
use App\Practice\Decorator\Soy;
use App\Practice\Command\Hottub;
use App\Practice\Command\Stereo;
use App\Practice\Decorator\Whip;
use App\Practice\Decorator\Mocha;
use App\Http\Controllers\Controller;
use App\Practice\Adapter\WildTurkey;
use App\Practice\Decorator\Espresso;
use App\Practice\Adapter\MallardDuck;
use App\Practice\Command\TvOnCommand;
use App\Practice\Decorator\DarkRoast;
use App\Practice\Singleton\Singleton;
use App\Practice\Command\MarcoCommand;
use App\Practice\Command\TvOffCommand;
use App\Practice\Decorator\HouseBlend;
use App\Practice\Observer\WeatherData;
use App\Practice\Adapter\TurkeyAdapter;
use App\Practice\Command\LightOnCommand;
use App\Practice\Adapter\Interfaces\Duck;
use App\Practice\Command\LightOffCommand;
use App\Practice\Command\StereoOnCommand;
use App\Practice\Command\HouttubOnCommand;
use App\Practice\Command\StereoOffCommand;
use App\Practice\Adapter\Interfaces\Turkey;
use App\Practice\Command\HouttubOffCommand;
use App\Practice\Command\SimpleRemoteControl;
use App\Practice\Factory\Creator\NyPizzaStore;
use App\Practice\Observer\CurrentDetailDisplay;
use App\Practice\Factory\Creator\ChicagoPizzaStore;
use App\Practice\Observer\CurrentConditionsDisplay;
use App\Practice\AbstractFactory\Factory\NyPizzaStore as NewNyPizzaStore;
use App\Practice\AbstractFactory\Factory\ChicagoPizzaStore as NewChicagoPizzaStore;
use App\Practice\Adapter\DuckAdapter;

class PatternController extends Controller
{
    public function adapter(): void
    {
        $duck = new MallardDuck();
        $duckAdapter = new DuckAdapter($duck);

        $turkey = new WildTurkey();
        $turkeyAdapter = new TurkeyAdapter($turkey);

        dump('The Turkey says...');
        $turkey->gobble();
        $turkey->fly();

        dump('The Duck says...');
        $this->testDuck($duck);

        dump('The Turkey adapter says...');
        $this->testDuck($turkeyAdapter);

        dump('The Duck adapter says...');
        $this->testTurkey($duckAdapter);
    }

    private function testDuck(Duck $duck): void
    {
        $duck->quack();
        $duck->fly();
    }

    private function testTurkey(Turkey $turkey): void
    {
        $turkey->gobble();
        $turkey->fly();
    }

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

    public function command(): void
    {
        $remoteControl = new SimpleRemoteControl();
        
        $light = new Light('Living Room');
        $tv = new Tv('Living Room');
        $stereo = new Stereo('Living Room');
        $hottub = new Hottub();

        $lightOnCommand = new LightOnCommand($light);
        $stereoOnCommand = new StereoOnCommand($stereo);
        $tvOnCommand = new TvOnCommand($tv);
        $hottubOnCommand = new HouttubOnCommand($hottub);

        $lightOffCommand = new LightOffCommand($light);
        $stereoOffCommand = new StereoOffCommand($stereo);
        $tvOffCommand = new TvOffCommand($tv);
        $hottubOffCommand = new HouttubOffCommand($hottub);
        
        $partyOn = [
            $lightOnCommand,
            $stereoOnCommand,
            $tvOnCommand,
            $hottubOnCommand,
        ];
        $partyOff = [
            $lightOffCommand,
            $stereoOffCommand,
            $tvOffCommand,
            $hottubOffCommand,
        ];
        $partyOnMarco = new MarcoCommand($partyOn);
        $partyOffMarco = new MarcoCommand($partyOff);
        $remoteControl->setCommand(0, $partyOnMarco, $partyOffMarco);

        dump($remoteControl);
        dump('--- Pushing Marco On ---');
        $remoteControl->onButtonWasPushed(0);
        dump('--- Pushing Marco Off ---');
        $remoteControl->offButtonWasPushed(0);
        dump('--- Undo Marco ---');
        $remoteControl->undoButtonWasPushed(0);
    }
}
