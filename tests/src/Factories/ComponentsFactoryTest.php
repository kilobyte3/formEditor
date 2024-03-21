<?php
declare(strict_types=1);

namespace tests\src\Factories;

/**
 * @see \Factories\ComponentsFactory
 */
final class ComponentsFactory extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test "create"
     */
    public function testCreate() : void
    {
        // build
        $sut = new \Factories\ComponentsFactory();
        $br = $sut->create('Br');
        $label = $sut->create('Label');

        // operation
        // check
        $this->assertInstanceOf('Forms\Component', $br);
        $this->assertInstanceOf('Forms\Component', $label);
        $this->assertInstanceOf('Forms\\Components\\Br', $br);
        $this->assertInstanceOf('Forms\\Components\\Label', $label);
    }
}