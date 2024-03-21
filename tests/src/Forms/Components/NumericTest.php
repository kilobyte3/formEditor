<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Numeric
 */
final class NumericTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => '','min' => 0, 'max' => 0], \Forms\Components\Numeric::getPropertiesAndDefaults());
    }

    /**
     * test setMax
     */
    public function test_setMax() : void
    {
        // build
        $numericMock = $this->getMockBuilder('Forms\Components\Numeric')->setMethods(['setProperty'])->getMock();
        $numericMock->expects($this->exactly(1))->method('setProperty')->with('setMax', 7)->willReturnSelf();

        // operation
        // check
        $this->assertSame($numericMock, $numericMock->setMax(7));
    }

    /**
     * test setMin
     */
    public function test_setMin() : void
    {
        // build
        $numericMock = $this->getMockBuilder('Forms\Components\Numeric')->setMethods(['setProperty'])->getMock();
        $numericMock->expects($this->exactly(1))->method('setProperty')->with('setMin', 2)->willReturnSelf();

        // operation
        // check
        $this->assertSame($numericMock, $numericMock->setMin(2));
    }

    /**
     * test setCaption
     */
    public function test_setValue() : void
    {
        // build
        $numericMock = $this->getMockBuilder('Forms\Components\Numeric')->setMethods(['setProperty'])->getMock();
        $numericMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 5)->willReturnSelf();

        // operation
        // check
        $this->assertSame($numericMock, $numericMock->setValue(5));
    }
}