<?php
namespace App\Practice\Command;

use App\Practice\Command\AbstractCeilingFanCommand;

class CeilingFanLowCommand extends AbstractCeilingFanCommand
{
    public function execute(): void
    {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->low();
    }
}