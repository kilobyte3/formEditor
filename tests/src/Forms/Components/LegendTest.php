<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Legend
 */
final class LegendTest extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test getPropertiesAndDefaults
     */
    public function test_getPropertiesAndDefaults() : void
    {
        // build
        // operation
        // check
        $this->assertSame(['caption' => ''], \Forms\Components\Legend::getPropertiesAndDefaults());
    }

    /**
     * test setCaption
     */
    public function test_setCaption() : void
    {
        // build
        $legendMock = $this->getMockBuilder('Forms\Components\Legend')->setMethods(['setProperty'])->getMock();
        $legendMock->expects($this->exactly(1))->method('setProperty')->with('setCaption', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($legendMock, $legendMock->setCaption('c'));
    }
}