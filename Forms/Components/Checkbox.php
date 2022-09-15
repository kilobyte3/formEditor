<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * checkbox
 */
final class Checkbox extends \Forms\Component
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'checked' => false
        ];
    }

    /**
     * set checked
     *
     * @param $value - value
     */
    public function setChecked(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }
}