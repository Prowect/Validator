<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Between implements IValidator
{
    public static function validate($input, $min = 0, $max = 100)
    {
		return Min::validate($input, $min) && Max::validate($input, $max);
    }
}
