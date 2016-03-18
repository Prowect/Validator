<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Maxlength implements IValidator
{
    public static function validate($input, $length)
    {
		return strlen($input) <= $length;
    }
}
