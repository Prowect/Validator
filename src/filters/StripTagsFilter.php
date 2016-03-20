<?php

namespace Drips\Validator\filters;

use Drips\Validator\IFilter;

class StripTagsFilter implements IFilter {

    public static function filter($input)
    {
        return strip_tags($input);
    }

}
