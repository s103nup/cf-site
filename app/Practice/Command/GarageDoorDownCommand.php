<?php
namespace App\Practice\Command;

use App\Practice\Command\GarageDoor;
use App\Practice\Command\CommandInterface;

class GarageDoorDownCommand implements CommandInterface
{
    private $garageDoor;

    public function __construct(GarageDoor $garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }

    public function execute(): void
    {
        $this->garageDoor->down();
    }
}