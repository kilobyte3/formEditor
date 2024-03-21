<?php
declare(strict_types=1);

namespace Forms;

/**
 * component
 */
abstract class Component
{
    protected array $properties;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->properties = $this->getPropertiesAndDefaultsAll();
    }

    /**
     * get properties and defaults all
     */
    public function getPropertiesAndDefaultsAll() : array
    {
        $output = [];
        $class = get_class($this);
        do {
            $output = array_merge($output, $class::getPropertiesAndDefaults());
            $class = get_parent_class($class);
        } while(method_exists($class, 'getPropertiesAndDefaults'));
        return $output;
    }

    /**
     * get properties and defaults
     */
    public static function getPropertiesAndDefaults() : array
    {
        return [
            'id' => '',
            'name' => '',
            'class' => '',
            'title' => '',
            'lang' => '',
            'disabled' => false
        ];
    }

    /**
     * set name
     *
     * @param $value - value
     */
    public function setName(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set id
     *
     * @param $value - value
     */
    public function setId(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set class
     *
     * @param $value - value
     */
    public function setClass(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set title
     *
     * @param $value - value
     */
    public function setTitle(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set language
     *
     * @param $value - value
     */
    public function setLang(string $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set disabled
     *
     * @param $value - value
     */
    public function setDisabled(bool $value) : self
    {
        return $this->setProperty(__FUNCTION__, $value);
    }

    /**
     * set property
     *
     * @param $name  - name
     * @param $value - value
     */
    protected function setProperty(string $name, $value) : self
    {
        $name = lcfirst(substr($name,3));
        switch(gettype($this->getPropertiesAndDefaultsAll()[$name]))
        {
            case 'string' :
                $value = (string)$value;
                break;
            case 'integer' :
                $value = (int)$value;
                break;
            case 'boolean' :
                $value = (bool)$value;
                break;
            case 'array' :
                if (!in_array($value, $this->getPropertiesAndDefaults()[$name]))
                {
                    throw new \RuntimeException('Illegal value: ['.$value.'], possible values: ['.implode($this->getPropertiesAndDefaults()[$name], ', ').']');
                }
                break;
            default :
                throw new \RuntimeException('Ismeretlen tipus: '.gettype($this->getPropertiesAndDefaultsAll()[$name]));
        }
        $this->properties[$name] = $value;
        return $this;
    }

    /**
     * save
     */
    public function save() : array
    {
        $data = [];
        self::getData($data);
        return $data;
    }

    /**
     * get properties
     *
     * @return string | array
     */
    public function getProperties(string $propertyName = '')
    {
        if ($propertyName === '')
        {
            return $this->properties;
        }
        else
        {
            return $this->properties[$propertyName];
        }
    }

    /**
     * @return string | false
     */
    public function getPropertyDefault(string $propertyName)
    {
        return $this->getPropertiesAndDefaultsAll()[$propertyName];
    }

    /**
     * get data
     */
    protected function getData(array &$data) : void
    {
        foreach($this->properties as $field => $value)
        {
            if ($value !== $this->getPropertiesAndDefaultsAll()[$field])
            {
                $data[$field] = $this->properties[$field];
            }
        }
        $data['_type'] = (new \ReflectionClass($this))->getShortName();
    }

    /**
     * load
     *
     * @param $data - data
     */
    public function load(array &$data) : void
    {
        foreach($this->getPropertiesAndDefaultsAll() as $name => $defaultValue)
        {
            if (is_array($defaultValue))
            {
                $defaultValue = $defaultValue[0]; // ha van értékkészlete, akkor az első eleme lesz az alapértelmezés
            }
            if (isset($data[$name]) && $data[$name] !== $defaultValue)
            {
                $m = 'set'.ucfirst($name);
                $this->$m($data[$name]);
                // lehett volna simán ezis: $this->properties[$name] = $data[$name]; de akkor ez nem szűrné ki a hibás inputot, pl checkbox stringet kaphat boolean helyett
            }
        }
    }
}