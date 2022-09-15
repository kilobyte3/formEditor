<?php
declare(strict_types=1);

namespace Forms\Renderers;

/**
 * XHTML renderer
 */
final class XHTMLrenderer extends Renderer
{
    /**
     * {@inheritDoc}
     */
    public function getName() : string
    {
        return 'XHTML';
    }

    /**
     * {@inheritDoc}
     */
    protected function getAttributeIfExists(string $attrName) : string
    {
        $output = $this->getComponent_getProperties($attrName);
        if ($output !== $this->getComponent_getPropertyDefault($attrName))
        {
            switch($attrName)
            {
                case 'disabled' :
                case 'checked' :
                case 'readonly' :
                case 'selected' :
                    return ' '.$attrName.'="'.$attrName.'"';
                default :
                    return ' '.$attrName.'="'.$output.'"';
            }
        }
        return '';
    }
}