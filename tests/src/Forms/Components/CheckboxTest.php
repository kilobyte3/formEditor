<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Checkbox
 */
final class CheckboxTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['checked' => false], \Forms\Components\Checkbox::getPropertiesAndDefaults());
    }

    /**
     * test setChecked
     */
    public function test_setChecked() : void
    {
        // build
        $checkboxMock1 = $this->getMockBuilder('Forms\Components\Checkbox')->setMethods(['setProperty'])->getMock();
        $checkboxMock1->expects($this->exactly(1))->method('setProperty')->with('setChecked', true)->willReturnSelf();
        $checkboxMock2 = $this->getMockBuilder('Forms\Components\Checkbox')->setMethods(['setProperty'])->getMock();
        $checkboxMock2->expects($this->exactly(1))->method('setProperty')->with('setChecked', false)->willReturnSelf();

        // operation
        // check
        $this->assertSame($checkboxMock1, $checkboxMock1->setChecked(true));
        $this->assertSame($checkboxMock2, $checkboxMock2->setChecked(false));
    }
}