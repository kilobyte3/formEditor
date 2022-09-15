<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * radio
 */
final class Radio extends \Forms\Container
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'value' => '',
            'checked' => false
        ];
    }

    /**
     * set value
     *
     * @param $value - value
     */
    public function setValue(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set value
     *
     * @param $value - value
     */
    public function setChecked(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }
}