<?php
namespace App\Practice\Command;

use App\Practice\Command\Tv;
use App\Practice\Command\CommandInterface;

class TvOnCommand implements CommandInterface
{
    private $tv;

    public function __construct(Tv $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): void
    {
        $this->tv->on();
    }
    
    public function undo(): void
    {
        $this->tv->off();
    }
}