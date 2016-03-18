<?php

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Maxlength implements IValidator
{
    public static function validate($input, $length = 20)
    {
        return strlen($input) <= $length;
    }
}
