<?php

namespace Drips\Validator\validators;

use Drips\Validator\filters\Trim;
use Drips\Validator\IValidator;

class Required implements IValidator
{
    public function validate($input)
    {
        $string = trim($input);

        return !empty($string);
    }
}
