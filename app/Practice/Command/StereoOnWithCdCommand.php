<?php
namespace App\Practice\Command;

use App\Practice\Command\Stereo;
use App\Practice\Command\CommandInterface;

class StereoOnWithCdCommand implements CommandInterface
{
    private $stereo;

    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute(): void
    {
        $this->stereo->on();
        $this->stereo->setCd();
        $this->stereo->setVoice(11);
    }
}