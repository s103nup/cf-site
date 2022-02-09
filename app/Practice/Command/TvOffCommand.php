<?php
namespace App\Practice\Command;

use App\Practice\Command\Tv;
use App\Practice\Command\CommandInterface;

class TvOffCommand implements CommandInterface
{
    private $tv;

    public function __construct(Tv $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): void
    {
        $this->tv->off();
    }
    
    public function undo(): void
    {
        $this->tv->on();
    }
}