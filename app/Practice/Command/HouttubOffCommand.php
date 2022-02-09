<?php
namespace App\Practice\Command;

use App\Practice\Command\Hottub;
use App\Practice\Command\CommandInterface;

class HouttubOffCommand implements CommandInterface
{
    private $hottub;

    public function __construct(Hottub $hottub)
    {
        $this->hottub = $hottub;
    }

    public function execute(): void
    {
        $this->hottub->off();
    }
    
    public function undo(): void
    {
        $this->hottub->on();
    }
}