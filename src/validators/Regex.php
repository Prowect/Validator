<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Regex implements IValidator
{
    protected $regex;

    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    public function validate($str)
    {
        return preg_match($this->regex, $str);
    }
}
