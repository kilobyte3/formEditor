<?php
declare(strict_types=1);

namespace Factories;

/**
 * components factory
 */
final class ComponentsFactory implements IComponentsFactory
{
    /**
     * {@inheritDoc}
     */
    public function create(string $component) : \Forms\Component
    {
        $component = '\\Forms\\Components\\'.$component;
        return new $component();
    }
}