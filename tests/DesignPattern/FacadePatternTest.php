<?php

namespace Tests\DesignPattern;

use Tests\TestCase;
use App\Practice\Helper;
use App\Practice\Facade\HomeTheaterFacade;

class FacadePatternTest extends TestCase
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
        $this->homeTheaterFacade = app(HomeTheaterFacade::class);
    }

    public function testWatchMovie()
    {
        $movieName = 'I am legend';
        $expectRows = [
            'Get ready to watch a movie ' . $movieName . ' ...',
            'Screen down',
            'DVD on',
        ];
        $this->expectOutputString($this->appendEol($expectRows));

        $this->homeTheaterFacade->watchMovie($movieName);
    }

    public function testEndMovie()
    {
        $expectRows = [
            'Shutting movie theater down...',
            'DVD off',
            'Screen up',
        ];
        $this->expectOutputString($this->appendEol($expectRows));

        $this->homeTheaterFacade->endMovie();
    }
}