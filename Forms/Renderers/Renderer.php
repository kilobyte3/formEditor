<?php
declare(strict_types=1);

namespace Forms\Renderers;

/**
 * renderer
 */
abstract class Renderer
{
    private \Forms\Component $component;

    /**
     * constructor
     *
     * @param $component - component
     */
    public function __construct(\Forms\Component $component)
    {
        $this->component = $component;
    }

    /**
     * get name
     */
    abstract public function getName() : string;

    /**
     * get attribute if exists
     */
    protected abstract function getAttributeIfExists(string $attrName) : string;

    /**
     * render
     */
    public function render() : string
    {
        ob_start();
        if ($this->component instanceof \Forms\Container)
        {
            $fields = '';
            foreach($this->component->getFields() as $field)
            {
                $fields.= (new static($field))->render();
            }
        }

        $attributes = '';
        foreach(array_keys($this->component->getPropertiesAndDefaultsAll()) as $attrName)
        {
            $attributes.= $this->getAttributeIfExists($attrName);
        }

        $properties = $this->getComponent_getProperties();
        include __DIR__.'/../templates/'.$this->getName().'/'.(new \ReflectionClass($this->component))->getShortName().'.php';
        echo "\r\n";
        return ob_get_clean();
    }

    ////////////////////////////////////////////// proxy methods

    /**
     * get properties of component
     *
     * @param $propertyName - property name
     *
     * @return string | array
     */
    final protected function getComponent_getProperties(string $propertyName = '')
    {
        return $this->component->getProperties($propertyName);
    }

    /**
     * get default properties of component
     *
     * @param $propertyName - property name
     *
     * @return false | string
     */
    final protected function getComponent_getPropertyDefault(string $propertyName)
    {
        return $this->component->getPropertyDefault($propertyName);
    }
}