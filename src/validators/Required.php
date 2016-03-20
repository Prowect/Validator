<?php
namespace Drips\Validator\validators;

use Drips\filters\Trim;

class Required implements IValidator
{
    public static function validate($input)
    {
        $string = Trim::filter($string);
		      return !empty($string);
    }
}
