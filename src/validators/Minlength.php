<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Minlength implements IValidator
{
    protected $minlength;

    public function __construct($minlength = 3)
    {
        $this->minlength = $minlength;
    }

    public function validate($input)
    {
		return strlen($input) >= $this->minlength;
    }
}
