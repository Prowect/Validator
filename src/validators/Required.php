<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Required implements IValidator
{
    public static function validate($input)
    {
        $input = Trim::filter($input);
		return !empty($input);
    }
}
