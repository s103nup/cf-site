<?php
namespace App\Practice\Command;

use App\Practice\Command\Light;
use App\Practice\Command\CommandInterface;

class LightOffCommand implements CommandInterface
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->off();
    }

    public function undo(): void
    {
        $this->light->on();
    }
}