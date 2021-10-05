<?php
namespace App\Practice\Command;

class GarageDoor
{
    private $description = '';

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function down()
    {
        dump($this->description . ' Garage Door is Close');
    }

    public function up()
    {
        dump($this->description . ' Garage Door is Open');
    }
}