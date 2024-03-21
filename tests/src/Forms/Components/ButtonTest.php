<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Button
 */
final class ButtonTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => ''], \Forms\Components\Button::getPropertiesAndDefaults());
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $buttonMock = $this->getMockBuilder('Forms\Components\Button')->setMethods(['setProperty'])->getMock();
        $buttonMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'v')->willReturnSelf();

        // operation
        // check
        $this->assertSame($buttonMock, $buttonMock->setValue('v'));
    }

    /**
     * test setValue
     *
     * ugyanaz, mint a fenti, mert állítólag protected metódust nem elegáns mock-olni
     * /
    public function test_setValue2() : void
    {
        // build
        $button = new \Forms\Components\Button();

        // operation
        $button->setValue('v');

        // check
        $this->assertSame('v', $button->getProperties('value'));
    }*/
}