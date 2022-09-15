<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Option
 */
final class OptionTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['caption' => '', 'value' => '', 'selected' => false, 'label' => ''], \Forms\Components\Option::getPropertiesAndDefaults());
    }

    /**
     * test setCaption
     */
    public function test_setCaption() : void
    {
        // build
        $optionMock = $this->getMockBuilder('Forms\Components\Option')->setMethods(['setProperty'])->getMock();
        $optionMock->expects($this->exactly(1))->method('setProperty')->with('setCaption', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($optionMock, $optionMock->setCaption('c'));
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $optionMock = $this->getMockBuilder('Forms\Components\Option')->setMethods(['setProperty'])->getMock();
        $optionMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($optionMock, $optionMock->setValue('c'));
    }

    /**
     * test setSelected
     */
    public function test_setSelected() : void
    {
        // build
        $optionMock = $this->getMockBuilder('Forms\Components\Option')->setMethods(['setProperty'])->getMock();
        $optionMock->expects($this->exactly(1))->method('setProperty')->with('setSelected', true)->willReturnSelf();

        // operation
        // check
        $this->assertSame($optionMock, $optionMock->setSelected(true));
    }

    /**
     * test setLabel
     */
    public function test_setLabel() : void
    {
        // build
        $optionMock = $this->getMockBuilder('Forms\Components\Option')->setMethods(['setProperty'])->getMock();
        $optionMock->expects($this->exactly(1))->method('setProperty')->with('setLabel', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($optionMock, $optionMock->setLabel('c'));
    }
}