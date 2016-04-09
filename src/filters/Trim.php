<?php

namespace Drips\Validator\filters;

use Drips\Validator\IFilter;

class Trim implements IFilter
{
    protected $char;

    public function __construct($char = null)
    {
        $this->char = $char;
    }

    public function filter($input)
    {
        if ($this->char !== null){
            return trim($input, $this->char);
        }
        return trim($input);
    }

}
