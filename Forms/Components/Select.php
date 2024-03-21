<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * select
 */
final class Select extends \Forms\Container
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'multiple' => false,
            'size' => 0
        ];
    }

    /**
     * add
     *
     * @param $option - option
     */
    public function add(\Forms\Component $option) : self
    {
        if (!($option instanceof \Forms\Components\Option))
        {
            throw new \RuntimeException('Only "Option" allowed!'); // typehint-nek nem tudom megadni a \Forms\Components\Option-t, mert akkor nem kompatibilis az örököltel
        }
        parent::add($option);
        return $this;
    }

    /**
     * set multiple
     *
     * @param $value - value
     */
    public function setMultiple(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set size
     *
     * @param $value - value
     */
    public function setSize(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }
}