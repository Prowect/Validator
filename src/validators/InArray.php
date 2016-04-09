<?php
namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class InArray implements IValidator
{
    protected $array = array();

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function validate($input)
    {
	    return in_array($input, $this->array);
    }
}
