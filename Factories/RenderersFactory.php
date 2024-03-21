<?php
declare(strict_types=1);

namespace Factories;

/**
 * renderers factory
 */
final class RenderersFactory implements IRenderersFactory
{
    /**
     * {@inheritDoc}
     */
    public function createHTML5(\Forms\Component $component) : \Forms\Renderers\HTML5renderer
    {
        return new \Forms\Renderers\HTML5renderer($component);
    }

    /**
     * {@inheritDoc}
     */
    public function createXHTML(\Forms\Component $component) : \Forms\Renderers\XHTMLrenderer
    {
        return new \Forms\Renderers\XHTMLrenderer($component);
    }
}