<?php

namespace ContactApi\Form;

use ContactApi\FormElement\FormElementInterface;

class Form
{
    /**
     * @var FormElementInterface[]
     */
    private $elements = array();

    /**
     * @param $name
     * @param FormElementInterface $element
     */
    public function addElement($name, FormElementInterface $element)
    {
        $this->elements[$name] = $element;
    }

    /**
     * @param $name
     * @return FormElementInterface
     */
    public function getElement($name)
    {
        return $this->elements[$name];
    }

    /**
     * Submit data from
     * @param $data
     */
    public function submit($data)
    {
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $this->elements)) {
                $this->elements[$key]->setValue($value);
            }
        }
    }

    /**
     * Valid data
     * @return bool
     */
    public function areValid()
    {
        foreach ($this->elements as $name => $element)
        {
            if (!$element->isValid()) {
                return false;
            }
        }

        return true;
    }
}