<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Between implements IValidator
{
    protected $min;
    protected $max;

    public function __construct($min = 0, $max = 100)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function validate($input)
    {
        $min_validator = new Min($this->min);
        $max_validator = new Max($this->max);

		return $min_validator->validate($input) && $max_validator->validate($input);
    }
}
