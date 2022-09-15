<?php
declare(strict_types=1);

namespace tests\src\Forms\Components;

/**
 * @see \Forms\Components\Form
 */
final class FormTest extends \PHPUnit\Framework\TestCase
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
        $this->assertSame([
            'action' => '',
            'method' => ['', 'get', 'post'],
            'enctype' => ''
        ], \Forms\Components\Form::getPropertiesAndDefaults());
    }

    /**
     * test setAction
     */
    public function test_setAction() : void
    {
        // build
        $formMock = $this->getMockBuilder('Forms\Components\Form')->setMethods(['setProperty'])->getMock();
        $formMock->expects($this->exactly(1))->method('setProperty')->with('setAction', 'val')->willReturnSelf();

        // operation
        // check
        $this->assertSame($formMock, $formMock->setAction('val'));
    }

    /**
     * test setMethod
     */
    public function test_setMethod() : void
    {
        // build
        $formMock = $this->getMockBuilder('Forms\Components\Form')->setMethods(['setProperty'])->getMock();
        $formMock->expects($this->exactly(1))->method('setProperty')->with('setMethod', 'val2')->willReturnSelf();

        // operation
        // check
        $this->assertSame($formMock, $formMock->setMethod('val2'));
    }

    /**
     * test setEnctype
     */
    public function test_setEnctype() : void
    {
        // build
        $formMock = $this->getMockBuilder('Forms\Components\Form')->setMethods(['setProperty'])->getMock();
        $formMock->expects($this->exactly(1))->method('setProperty')->with('setEnctype', 'val2')->willReturnSelf();

        // operation
        // check
        $this->assertSame($formMock, $formMock->setEnctype('val2'));
    }

    /**
     * test save
     */
    public function test_save() : void
    {
        // build
        $formMock = $this->getMockBuilder('Forms\Components\Form')->disableOriginalClone()->setMethods(['getData'])->getMock();
        $formMock->expects($this->exactly(1))->method('getData')->with([])->will($this->returnCallback(function(&$matches) { $matches = [1,2,3]; return true; }));

        // operation
        // check
        $this->assertSame([1,2,3], $formMock->save());
    }

    /**
     * test load
     */
    public function test_load() : void
    {
        // build
        $formMock = $this->getMockBuilder('Forms\Components\Form')->setMethods(['clear'])->getMock();
        $formMock->expects($this->exactly(1))->method('clear')->with();
        $data = ['enctype' => 'test'];

        // operation
        $formMock->load($data);

        // check
        $this->assertSame(['enctype' => 'test'], $data);
        $this->assertArrayHasKey('enctype', $formMock->getProperties());
        $this->assertSame('test', $formMock->getProperties('enctype'));
    }
}