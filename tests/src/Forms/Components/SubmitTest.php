<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Submit
 */
final class SubmitTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => ''], \Forms\Components\Submit::getPropertiesAndDefaults());
    }

    /**
     * test setValue
     */
    public function test_setValue() : void
    {
        // build
        $submitMock = $this->getMockBuilder('Forms\Components\Submit')->setMethods(['setProperty'])->getMock();
        $submitMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 'v')->willReturnSelf();

        // operation
        // check
        $this->assertSame($submitMock, $submitMock->setValue('v'));
    }
}