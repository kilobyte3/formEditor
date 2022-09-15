<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * input
 */
final class Input extends \Forms\Component
{
    /**
     * get properties and defaults
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'value' => '',
            'maxlength' => 0
        ];
    }

    /**
     * set max length
     *
     * @param $value - value
     */
    public function setMaxlength(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
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