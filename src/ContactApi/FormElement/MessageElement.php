<?php

namespace ContactApi\FormElement;

use ContactApi\Validator\ValidatorInterface;

class MessageElement implements FormElementInterface
{
    private $value;

    /** @var ValidatorInterface */
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function isValid()
    {
        return $this->validator->isValid($this->value);
    }

    public function getValue()
    {
        return $this->value;
    }
}