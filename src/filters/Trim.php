<?php

namespace Drips\Validator\filters;

use Drips\Validator\IFilter;

class Trim implements IFilter {

    public static function filter($input, $character = null)
    {
        if ($character !== null){
            return trim($input, $character);
        }
        return trim($input);
    }

}
