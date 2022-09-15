<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Input
 */
final class InputTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => '', 'maxlength' => 0], \Forms\Components\Input::getPropertiesAndDefaults());
    }

    /**
     * test setMaxlength
     */
    public function test_setMaxlength() : void
    {
        // build
        $inputMock = $this->getMockBuilder('Forms\Components\Input')->setMethods(['setProperty'])->getMock();
        $inputMock->expects($this->exactly(1))->method('setProperty')->with('setMaxlength', 213)->willReturnSelf();

        // operation
        // check
        $this->assertSame($inputMock, $inputMock->setMaxlength(213));
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $inputMock = $this->getMockBuilder('Forms\Components\Input')->setMethods(['setProperty'])->getMock();
        $inputMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'val')->willReturnSelf();

        // operation
        // check
        $this->assertSame($inputMock, $inputMock->setValue('val'));
    }
}