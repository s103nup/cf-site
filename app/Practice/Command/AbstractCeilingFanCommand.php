<?php
namespace App\Practice\Command;

use App\Practice\Command\CommandInterface;

abstract class AbstractCeilingFanCommand implements CommandInterface
{
    protected $ceilingFan;
    protected $prevSpeed;

    public function __construct(CeilingFan $ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }

    public function undo(): void
    {
        if ($this->prevSpeed === CeilingFan::HIGH) {
            $this->ceilingFan->high();
        } elseif ($this->prevSpeed === CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } elseif ($this->prevSpeed === CeilingFan::LOW) {
            $this->ceilingFan->low();
        } elseif ($this->prevSpeed === CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}