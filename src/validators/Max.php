<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Max implements IValidator
{
    public static function validate($input, $max = 0)
    {
		return Number::validate($input) && $input <= $max;
    }
}
