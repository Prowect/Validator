<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Min implements IValidator
{
    protected $min;

    public function __construct($min = 0)
    {
        $this->min = $min;
    }

    public function validate($input)
    {
        $number_validator = new Number;

		return $number_validator->validate($input) && $input >= $this->min;
    }
}
