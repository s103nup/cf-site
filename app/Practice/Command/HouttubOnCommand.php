<?php
namespace App\Practice\Command;

use App\Practice\Command\Hottub;
use App\Practice\Command\CommandInterface;

class HouttubOnCommand implements CommandInterface
{
    private $hottub;

    public function __construct(Hottub $hottub)
    {
        $this->hottub = $hottub;
    }

    public function execute(): void
    {
        $this->hottub->on();
    }
    
    public function undo(): void
    {
        $this->hottub->off();
    }
}