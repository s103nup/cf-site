<?php
namespace App\Practice\Command;

use App\Practice\Command\Stereo;
use App\Practice\Command\CommandInterface;

class StereoOnCommand implements CommandInterface
{
    private $stereo;

    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute(): void
    {
        $this->stereo->on();
    }
    
    public function undo(): void
    {
        $this->stereo->off();
    }
}