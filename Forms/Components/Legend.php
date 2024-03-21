<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * legend
 */
final class Legend extends \Forms\Component
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'caption' => ''
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
}