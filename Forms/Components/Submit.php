<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * submit
 */
final class Submit extends \Forms\Component
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'value' => ''
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
}