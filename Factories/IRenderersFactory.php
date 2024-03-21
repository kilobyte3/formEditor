<?php
declare(strict_types=1);

namespace Factories;

/**
 * renderers factory interface
 */
interface IRenderersFactory
{
    /**
     * create HTML5 renderer
     *
     * @param $component - component
     */
    public function createHTML5(\Forms\Component $component) : \Forms\Renderers\HTML5renderer;

    /**
     * create XHTML renderer
     *
     * @param $component - component
     */
    public function createXHTML(\Forms\Component $component) : \Forms\Renderers\XHTMLrenderer;
}