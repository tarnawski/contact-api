<?php

namespace ContactApi\FormElement;

interface FormElementInterface
{
    /**
     * @param string $value
     */
    public function setValue($value);

    /**
     * @return bool
     */
    public function isValid();

    /**
     * @return string
     */
    public function getValue();
}