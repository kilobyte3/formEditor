<?php
declare(strict_types=1);

namespace Forms\Components;

/**
 * form
 */
final class Form extends \Forms\Container
{
    /**
     * {@inheritDoc}
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'action' => '',
            'method' => ['', 'get', 'post'],
            'enctype' => ''
        ];
    }

    /**
     * set action
     *
     * @param $value - value
     */
    public function setAction(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set method
     *
     * @param $value - value
     */
    public function setMethod(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set encoding type
     *
     * @param $value - value
     */
    public function setEnctype(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function save() : array
    {
        $data = [];
        $this->getData($data);
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function load(array &$data) : void
    {
        $this->clear();
        parent::load($data);
    }
}