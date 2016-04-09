<?php

namespace Drips\Validator\filters;

use Drips\Validator\IFilter;

class StripTags implements IFilter {

    public function filter($input)
    {
        return strip_tags($input);
    }

}
