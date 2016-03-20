<?php
namespace Drips\Validator\validators;

use Drips\Validator\filters\Trim;
use Drips\Validator\IValidator;

class Required implements IValidator
{
    public static function validate($input)
    {
        $string = Trim::filter($input);
		      return !empty($string);
    }
}
