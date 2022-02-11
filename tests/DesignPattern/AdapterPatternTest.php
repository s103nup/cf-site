<?php

namespace Tests\DesignPattern;

use Tests\TestCase;
use App\Practice\Helper;
use App\Practice\Adapter\WildTurkey;
use App\Practice\Adapter\DuckAdapter;
use App\Practice\Adapter\MallardDuck;
use App\Practice\Adapter\TurkeyAdapter;
use App\Practice\Adapter\Interfaces\Duck;
use App\Practice\Adapter\Interfaces\Turkey;

class AdapterPatternTest extends TestCase
{
    use Helper;

    /**
     * HomeTheaterFacade
     *
     * @var HomeTheaterFacade
     */
    private $homeTheaterFacade;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->mallardDuck = app(MallardDuck::class);
        $this->wildTurkey = app(WildTurkey::class);
    }

    public function testMallardDuck()
    {
        $expectRows = [
            'I\'m flying',
            'Quack',
        ];
        $this->expectOutputString($this->appendEol($expectRows));
        $this->duckFlyAndQuack($this->mallardDuck);
    }

    public function testWildTurkey()
    {
        $expectRows = [
            'I\'m flying a short distance',
            'Gobble gobble'
        ];
        $this->expectOutputString($this->appendEol($expectRows));
        $this->turkeyFlyAndGobble($this->wildTurkey);
    }

    public function testDuckAdapter()
    {
        $expectRows = [
            'I\'m flying a short distance',
            'I\'m flying a short distance',
            'I\'m flying a short distance',
            'I\'m flying a short distance',
            'I\'m flying a short distance',
            'Gobble gobble'
        ];
        $this->expectOutputString($this->appendEol($expectRows));
        $this->duckFlyAndQuack(new TurkeyAdapter($this->wildTurkey));
    }

    private function duckFlyAndQuack(Duck $duck)
    {
        $duck->fly();
        $duck->quack();
    }

    private function turkeyFlyAndGobble(Turkey $turkey)
    {
        $turkey->fly();
        $turkey->gobble();
    }
}