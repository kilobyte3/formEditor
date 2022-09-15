<?php
declare(strict_types=1);

namespace tests\src\Factories;

/**
 * @see \Forms\Renderers\Renderer
 */
final class RendererTest extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test constructor
     */
    public function testConstructor() : void
    {
        // build
        $componentMock = $this->createMock(\Forms\Component::class);
        $sut = new \Forms\Renderers\HTML5renderer($componentMock);

        // operation
        // check
        $this->assertSame($componentMock, $this->getNonAccessibleProperty($sut, 'component'));
    }

    /**
     * test render1
     */
    public function test_render1() : void
    {
        // build
        $component = new \Forms\Components\Br();
        $sut = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame("<br>\r\n", $sut->render());
    }

    /**
     * test render2
     */
    public function test_render2() : void
    {
        // build
        $component = new \Forms\Components\Checkbox();
        $component->setDisabled(true);
        $component->setLang('language');
        $component->setId('sdfsd');
        $sut = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame("<input type=\"checkbox\" id=\"sdfsd\" lang=\"language\" disabled>\r\n", $sut->render());
    }

    /**
     * test render container
     */
    public function test_renderContainer() : void
    {
        // build
        $component = new \Forms\Components\Fieldset();
        $component->setDisabled(true);
        $component->setLang('language');
        $component->setId('sdfsd');
        $component->addLegend()->setName('[legend]');
        $sut = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame("<fieldset id=\"sdfsd\" lang=\"language\" disabled>\r\n<legend name=\"[legend]\"></legend>\r\n</fieldset>\r\n", $sut->render());
    }
}