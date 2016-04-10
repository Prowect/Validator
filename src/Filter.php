<?php

namespace Drips\Validator;

class Filter implements IFilter
{
    protected $filters = array();

    public function add(IFilter $filter)
    {
        $this->filters[] = $filter;
    }

    public function filter($input)
    {
        foreach ($this->filters as $filter) {
            $input = $filter->filter($input);
        }

        return $input;
    }
}
