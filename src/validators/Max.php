<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Max implements IValidator
{
    protected $max;

    public function __construct($max = 0)
    {
        $this->max = $max;
    }

    public function validate($input)
    {
        $number_validator = new Number;

		return $number_validator->validate($input) && $input <= $this->max;
    }
}
