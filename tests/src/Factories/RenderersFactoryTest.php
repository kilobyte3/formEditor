<?php
declare(strict_types=1);

namespace tests\src\Factories;

/**
 * @see \Factories\RenderersFactory
 */
final class RenderersFactory extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test createHTML5
     *
     * @throws \ReflectionException
     */
    public function testCreateHTML5() : void
    {
        // build
        $componentStub = $this->createMock('Forms\Components\Br');
        $sut = (new \Factories\RenderersFactory())->createHTML5($componentStub);

        // operation
        // check
        $this->assertInstanceOf('Forms\Renderers\HTML5renderer', $sut);
        $this->assertInstanceOf('Forms\Renderers\Renderer', $sut);
    }

    /**
     * test createXHTML
     *
     * @throws \ReflectionException
     */
    public function testCreateXHTML() : void
    {
        // build
        $componentStub = $this->createMock('Forms\Components\Br');
        $sut = (new \Factories\RenderersFactory())->createXHTML($componentStub);

        // operation
        // check
        $this->assertInstanceOf('Forms\Renderers\XHTMLrenderer', $sut);
        $this->assertInstanceOf('Forms\Renderers\Renderer', $sut);
    }
}