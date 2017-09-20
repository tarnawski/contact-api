<?php

namespace ContactApi\Validator;

interface ValidatorInterface
{
    /**
     * @param string $value
     * @return bool
     */
    public function isValid($value);
}