<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * numeric input
 */
final class Numeric extends \Forms\Component
{
    /**
     * get properties and defaults
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'value' => '',
            'min' => 0,
            'max' => 0
        ];
    }

    /**
     * set max length
     *
     * @param $value - value
     */
    public function setMax(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set max length
     *
     * @param $value - value
     */
    public function setMin(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set value
     *
     * @param $value - value
     */
    public function setValue(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, (string)$value);
    }
}