<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Label
 */
final class LabelTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['caption' => '', 'for' => ''], \Forms\Components\Label::getPropertiesAndDefaults());
    }

    /**
     * test setCaption
     */
    public function test_setCaption() : void
    {
        // build
        $labelMock = $this->getMockBuilder('Forms\Components\Label')->setMethods(['setProperty'])->getMock();
        $labelMock->expects($this->exactly(1))->method('setProperty')->with('setCaption', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($labelMock, $labelMock->setCaption('c'));
    }

    /**
     * test setFor
     */
    public function test_setFor() : void
    {
        // build
        $labelMock = $this->getMockBuilder('Forms\Components\Label')->setMethods(['setProperty'])->getMock();
        $labelMock->expects($this->exactly(1))->method('setProperty')->with('setFor', 'val')->willReturnSelf();

        // operation
        // check
        $this->assertSame($labelMock, $labelMock->setFor('val'));
    }
}