<?php

namespace Drips\Validator\filters;

use Drips\Validator\IFilter;

class HtmlEntities implements IFilter {

    public function filter($input)
    {
        return htmlentities($input);
    }

}
