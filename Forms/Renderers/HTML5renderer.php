<?php
declare(strict_types=1);

namespace Forms\Renderers;

/**
 * HTML5 renderer
 */
final class HTML5renderer extends Renderer
{
    /**
     * {@inheritDoc}
     */
    public function getName() : string
    {
        return 'HTML5';
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
                    return ' '.$attrName;
                default :
                    return ' '.$attrName.'="'.$output.'"';
            }
        }
        return '';
    }
}