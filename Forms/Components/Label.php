<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * label
 */
final class Label extends \Forms\Container
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'caption' => '',
            'for' => ''
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
     * set for
     *
     * @param $value - value
     */
    public function setFor(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }
}