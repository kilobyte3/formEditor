<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Textarea
 */
final class TextareaTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => '', 'maxlength' => 0, 'rows' => 0, 'readonly' => false, 'cols' => 0], \Forms\Components\Textarea::getPropertiesAndDefaults());
    }

    /**
     * test setRows
     */
    public function test_setRows() : void
    {
        // build
        $textareaMock = $this->getMockBuilder('Forms\Components\Textarea')->setMethods(['setProperty'])->getMock();
        $textareaMock->expects($this->exactly(1))->method('setProperty')->with('setRows', 5)->willReturnSelf();

        // operation
        // check
        $this->assertSame($textareaMock, $textareaMock->setRows(5));
    }

    /**
     * test setReadonly
     */
    public function test_setReadonly() : void
    {
        // build
        $textareaMock = $this->getMockBuilder('Forms\Components\Textarea')->setMethods(['setProperty'])->getMock();
        $textareaMock->expects($this->exactly(1))->method('setProperty')->with('setReadonly', true)->willReturnSelf();

        // operation
        // check
        $this->assertSame($textareaMock, $textareaMock->setReadonly(true));
    }

    /**
     * test setCols
     */
    public function test_setCols() : void
    {
        // build
        $textareaMock = $this->getMockBuilder('Forms\Components\Textarea')->setMethods(['setProperty'])->getMock();
        $textareaMock->expects($this->exactly(1))->method('setProperty')->with('setCols', 2)->willReturnSelf();

        // operation
        // check
        $this->assertSame($textareaMock, $textareaMock->setCols(2));
    }

    /**
     * test setMaxlength
     */
    public function test_setMaxlength() : void
    {
        // build
        $textareaMock = $this->getMockBuilder('Forms\Components\Textarea')->setMethods(['setProperty'])->getMock();
        $textareaMock->expects($this->exactly(1))->method('setProperty')->with('setMaxlength', 99)->willReturnSelf();

        // operation
        // check
        $this->assertSame($textareaMock, $textareaMock->setMaxlength(99));
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $textareaMock = $this->getMockBuilder('Forms\Components\Textarea')->setMethods(['setProperty'])->getMock();
        $textareaMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'c222')->willReturnSelf();

        // operation
        // check
        $this->assertSame($textareaMock, $textareaMock->setValue('c222'));
    }
}