<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Select
 */
final class SelectTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame(['multiple' => false, 'size' => 0], \Forms\Components\Select::getPropertiesAndDefaults());
    }

    /**
     * test add-failed
     */
    public function test_addFailed() : void
    {
        // build
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Only "Option" allowed!');
        $sut = new \Forms\Components\Select();
        $selectMock = $this->createMock('Forms\Components\Select');

        // operation
        $sut->add($selectMock);
    }

    /**
     * test add
     */
    public function test_add() : void
    {
        // build
        $sut = new \Forms\Components\Select();
        $selectMock = $this->createMock('Forms\Components\Option');

        // operation
        $sut->add($selectMock);

        // check
        $this->assertInstanceOf('Forms\Components\Option', $sut->getFields()[0]);
    }

    /**
     * test setMultiple
     */
    public function test_setMultiple() : void
    {
        // build
        $selectMock1 = $this->getMockBuilder('Forms\Components\Select')->setMethods(['setProperty'])->getMock();
        $selectMock1->expects($this->exactly(1))->method('setProperty')->with('setMultiple', true)->willReturnSelf();
        $selectMock2 = $this->getMockBuilder('Forms\Components\Select')->setMethods(['setProperty'])->getMock();
        $selectMock2->expects($this->exactly(1))->method('setProperty')->with('setMultiple', false)->willReturnSelf();

        // operation
        // check
        $this->assertSame($selectMock1, $selectMock1->setMultiple(true));
        $this->assertSame($selectMock2, $selectMock2->setMultiple(false));
    }

    /**
     * test setSize
     */
    public function test_setSize() : void
    {
        // build
        $selectMock = $this->getMockBuilder('Forms\Components\Select')->setMethods(['setProperty'])->getMock();
        $selectMock->expects($this->exactly(1))->method('setProperty')->with('setSize', 8)->willReturnSelf();

        // operation
        // check
        $this->assertSame($selectMock, $selectMock->setSize(8));
    }
}