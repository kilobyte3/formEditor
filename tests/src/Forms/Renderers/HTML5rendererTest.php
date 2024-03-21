<?php
declare(strict_types=1);

namespace tests\src\Forms\Renderers;

/**
 * @see \Forms\Renderers\HTML5renderer
 */
final class HTML5rendererTest extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test getName
     */
    public function testGetName() : void
    {
        // build
        $componentMock = $this->createMock(\Forms\Component::class);
        $sut = new \Forms\Renderers\HTML5renderer($componentMock);

        // operation
        // check
        $this->assertSame('HTML5', $sut->getName());
    }

    /**
     * test getAttributeIfExists
     */
    public function testGetAttributeIfExists_empty() : void
    {
        // build
        $sut = new \Forms\Renderers\HTML5renderer(new \Forms\Components\Checkbox());

        // operation
        // check
        $this->assertSame('', $this->executeNonAccessibleMethod($sut, 'getAttributeIfExists', 'lang'));
    }

    /**
     * test getAttributeIfExists_checked
     */
    public function testGetAttributeIfExists_checked() : void
    {
        // build
        $component = new \Forms\Components\Checkbox();
        $component->setChecked(true);
        $sut1 = new \Forms\Renderers\HTML5renderer($component);
        $component = new \Forms\Components\Checkbox();
        $component->setChecked(false);
        $sut2 = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame(' checked', $this->executeNonAccessibleMethod($sut1, 'getAttributeIfExists', 'checked'));
        $this->assertSame('', $this->executeNonAccessibleMethod($sut2, 'getAttributeIfExists', 'checked'));
    }

    /**
     * test getAttributeIfExists_readonly
     */
    public function testGetAttributeIfExists_readonly() : void
    {
        // build
        $component = new \Forms\Components\Textarea();
        $component->setReadonly(true);
        $sut1 = new \Forms\Renderers\HTML5renderer($component);
        $component = new \Forms\Components\Textarea();
        $component->setReadonly(false);
        $sut2 = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame(' readonly', $this->executeNonAccessibleMethod($sut1, 'getAttributeIfExists', 'readonly'));
        $this->assertSame('', $this->executeNonAccessibleMethod($sut2, 'getAttributeIfExists', 'readonly'));
    }

    /**
     * test getAttributeIfExists_disabled
     */
    public function testGetAttributeIfExists_disabled() : void
    {
        // build
        $component = new \Forms\Components\Checkbox();
        $component->setDisabled(true);
        $sut1 = new \Forms\Renderers\HTML5renderer($component);
        $component = new \Forms\Components\Checkbox();
        $component->setDisabled(false);
        $sut2 = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame(' disabled', $this->executeNonAccessibleMethod($sut1, 'getAttributeIfExists', 'disabled'));
        $this->assertSame('', $this->executeNonAccessibleMethod($sut2, 'getAttributeIfExists', 'disabled'));
    }

    /**
     * test getAttributeIfExists_selected
     */
    public function testGetAttributeIfExists_selected() : void
    {
        // build
        $component = new \Forms\Components\Option();
        $component->setSelected(true);
        $sut1 = new \Forms\Renderers\HTML5renderer($component);
        $component = new \Forms\Components\Option();
        $component->setSelected(false);
        $sut2 = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame(' selected', $this->executeNonAccessibleMethod($sut1, 'getAttributeIfExists', 'selected'));
        $this->assertSame('', $this->executeNonAccessibleMethod($sut2, 'getAttributeIfExists', 'selected'));
    }

    /**
     * test getAttributeIfExists_custom
     */
    public function testGetAttributeIfExists_custom() : void
    {
        // build
        $component = new \Forms\Components\Button();
        $component->setLang('lang2');
        $sut = new \Forms\Renderers\HTML5renderer($component);

        // operation
        // check
        $this->assertSame(' lang="lang2"', $this->executeNonAccessibleMethod($sut, 'getAttributeIfExists', 'lang'));
    }
}