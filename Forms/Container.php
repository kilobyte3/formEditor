<?php
declare(strict_types=1);

namespace Forms;

/**
 * container
 */
abstract class Container extends Component
{
    protected array $fields;

    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->clear();
    }

    /**
     * create component
     *
     * @param $name - name
     */
    private function createComponent(string $name) : Component
    {
        $name = '\\'.__NAMESPACE__.'\\Components\\'.$name;
        return new $name();
    }

    /**
     * get fields
     */
    final public function getFields() : array
    {
        return $this->fields;
    }

    /**
     * clear
     */
    protected function clear() : void
    {
        $this->fields = [];
    }

    /**
     * add
     *
     * @param $component = component
     */
    protected function add(Component $component) : Component
    {
        $this->fields[] = $component;
        return $component;
    }

    /**
     * add checkbox
     */
    public function addCheckbox() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add input
     */
    public function addInput() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add fieldset
     */
    public function addFieldset() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add textarea
     */
    public function addTextarea() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add button
     */
    public function addButton() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add submit
     */
    public function addSubmit() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add label
     */
    public function addLabel() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add pasword
     */
    public function addPassword() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add select
     */
    public function addSelect() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add option
     */
    public function addOption() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add br
     */
    public function addBr() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add legend
     */
    public function addLegend() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * add radio
     */
    public function addRadio() : Component
    {
        return $this->add($this->createComponent(substr(__FUNCTION__, 3)));
    }

    /**
     * {@inheritDoc}
     */
    protected function getData(array &$data) : void
    {
        parent::getData($data);
        if ($this->fields !== [])
        {
            $fields = $this->fields;
            foreach($fields as &$field)
            {
                /** @var $field Component */
                $f = [];
                $field->getData($f);
                $field = $f;
            }
            unset($field);
            $data['fields'] = $fields;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function load(array &$data) : void
    {
        if (isset($data['fields']))
        {
            foreach($data['fields'] as $field)
            {
                $f = $this->createComponent($field['_type']);
                unset($field['_type']);
                $f->load($field);
                $this->add($f);
            }
        }
        parent::load($data);
    }
}