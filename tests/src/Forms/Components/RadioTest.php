<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Radio
 */
final class RadioTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => '', 'checked' => false], \Forms\Components\Radio::getPropertiesAndDefaults());
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $radioMock = $this->getMockBuilder('Forms\Components\Radio')->setMethods(['setProperty'])->getMock();
        $radioMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'c')->willReturnSelf();

        // operation
        // check
        $this->assertSame($radioMock, $radioMock->setValue('c'));
    }

    /**
     * test setChecked
     */
    public function test_setChecked() : void
    {
        // build
        $radioMock1 = $this->getMockBuilder('Forms\Components\Radio')->setMethods(['setProperty'])->getMock();
        $radioMock1->expects($this->exactly(1))->method('setProperty')->with('setChecked', true)->willReturnSelf();
        $radioMock2 = $this->getMockBuilder('Forms\Components\Radio')->setMethods(['setProperty'])->getMock();
        $radioMock2->expects($this->exactly(1))->method('setProperty')->with('setChecked', false)->willReturnSelf();

        // operation
        // check
        $this->assertSame($radioMock1, $radioMock1->setChecked(true));
        $this->assertSame($radioMock2, $radioMock2->setChecked(false));
    }
}