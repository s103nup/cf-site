<?php
namespace Tests\DesignPattern;

use Tests\TestCase;
use App\Practice\Helper;
use App\Practice\TemplateMethod\Tea;
use App\Practice\TemplateMethod\Coffee;

class TemplateMethodPatternTest extends TestCase
{
    use Helper;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testSteepTea(): void
    {
        $expectRows = [
            'Boiling water',
            'Steeping the Tea',
            'Pouring into cup',
            'Adding Lemon',
        ];
        $this->expectOutputString($this->appendEol($expectRows));

        $beverage = new Tea();
        $beverage->prepareRecipe();
    }

    public function testBrewCoffee(): void
    {
        $expectRows = [
            'Boiling water',
            'Dripping Coffee through filter',
            'Pouring into cup',
            'Adding Sugar and Milk',
        ];
        $this->expectOutputString($this->appendEol($expectRows));

        $beverage = new Coffee();
        $beverage->prepareRecipe();
        # 288
    }
}
