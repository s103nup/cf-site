<?php

namespace App\Practice\Facade;

use App\Practice\Helper;

class HomeTheaterFacade
{
    use Helper;

    protected $dvd;
    protected $screen;

    public function __construct(Screen $screen, Dvd $dvd)
    {
        $this->screen = $screen;
        $this->dvd = $dvd;
    }

    public function watchMovie(string $name): void
    {
        $this->echoWithEol('Get ready to watch a movie ' . $name . ' ...');
        $this->screen->down();
        $this->dvd->on();
    }

    public function endMovie(): void
    {
        $this->echoWithEol('Shutting movie theater down...');
        $this->dvd->off();
        $this->screen->up();
    }
}