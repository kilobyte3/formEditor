<?php
declare(strict_types=1);

namespace Factories;

/**
 * components factory interface
 */
interface IComponentsFactory
{
    /**
     * create
     *
     * @param $component - component
     */
    public function create(string $component) : \Forms\Component;
}