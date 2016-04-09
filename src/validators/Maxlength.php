<?php

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Maxlength implements IValidator
{
    protected $maxlength;

    public function __construct($maxlength = 20)
    {
        $this->maxlength = $maxlength;
    }

    public function validate($input)
    {
        return strlen($input) <= $this->maxlength;
    }
}
