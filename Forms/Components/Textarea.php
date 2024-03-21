<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * textarea
 */
final class Textarea extends \Forms\Component
{
    /**
     * get properties and defaults
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'value' => '',
            'maxlength' => 0,
            'rows' => 0,
            'readonly' => false,
            'cols' => 0
        ];
    }

    /**
     * set rows
     *
     * @param $value - value
     */
    public function setRows(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set read only
     *
     * @param $value - value
     */
    public function setReadonly(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set cols
     *
     * @param $value - value
     */
    public function setCols(int $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
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