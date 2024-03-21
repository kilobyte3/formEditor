<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * option
 */
final class Option extends \Forms\Component
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'caption' => '',
            'value' => '',
            'selected' => false,
            'label' => ''
        ];
    }

    /**
     * set caption
     *
     * @param $value - value
     */
    public function setCaption(string $value) : self
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

    /**
     * set selected
     *
     * @param $value - value
     */
    public function setSelected(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set label
     *
     * @param $value - value
     */
    public function setLabel(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }
}