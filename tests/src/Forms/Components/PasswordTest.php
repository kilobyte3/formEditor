<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Password
 */
final class PasswordTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['value' => '', 'maxlength' => 0], \Forms\Components\Password::getPropertiesAndDefaults());
    }

    /**
     * test setMax
     */
    public function test_setMax() : void
    {
        // build
        $passwordMock = $this->getMockBuilder('Forms\Components\Password')->setMethods(['setProperty'])->getMock();
        $passwordMock->expects($this->exactly(1))->method('setProperty')->with('setMaxlength', 7)->willReturnSelf();

        // operation
        // check
        $this->assertSame($passwordMock, $passwordMock->setMaxlength(7));
    }

    /**
     * test setCaption
     */
    public function test_setValue() : void
    {
        // build
        $passwordMock = $this->getMockBuilder('Forms\Components\Password')->setMethods(['setProperty'])->getMock();
        $passwordMock->expects($this->exactly(1))->method('setProperty')->with('setValue', 5)->willReturnSelf();

        // operation
        // check
        $this->assertSame($passwordMock, $passwordMock->setValue('5'));
    }
}