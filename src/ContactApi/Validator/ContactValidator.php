<?php

namespace ContactApi\Validator;

class ContactValidator implements ValidatorInterface
{
    public function isValid($value)
    {
        if (strlen($value) < 8) {
            return false;
        }

        if (strlen($value) > 600) {
            return false;
        }

        if (strpos($value, '@')) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
        } else {
            if(!preg_match('/^[0-9]{3}[\s-]?[0-9]{3}[\s-]?[0-9]{3,4}$/', $value)) {
                return false;
            }
        }

        return true;
    }
}