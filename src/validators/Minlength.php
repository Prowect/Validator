<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Minlength implements IValidator
{
    public static function validate($input, $length = 3)
    {
		return strlen($input) >= $length;
    }
}
