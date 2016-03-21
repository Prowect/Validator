<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class InArray implements IValidator
{
    public static function validate($input, array $array = array())
    {
	    return in_array($input, $array);
    }
}
