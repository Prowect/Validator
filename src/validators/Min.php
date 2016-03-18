<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Min implements IValidator
{
    public static function validate($input, $min = 0)
    {
		return Number::validate($input) && $input >= $min;
    }
}
