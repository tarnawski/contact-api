<?php

namespace ContactApi\Validator;

class MessageValidator implements ValidatorInterface
{
    public function isValid($value)
    {
        if (strlen($value) < 10) {
            return false;
        }

        if (strlen($value) > 600) {
            return false;
        }

        return true;
    }
}