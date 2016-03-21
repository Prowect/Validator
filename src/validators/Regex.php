<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Regex implements IValidator
{
    public static function validate($str, $regex = null)
    {
        if ($regex !== null) {
            return preg_match($regex, $str);
        }
        return false;
    }
}
