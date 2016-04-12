<?php

namespace Drips\Validator;

class Filter implements IFilter
{
    protected $filters = array();

    public function add(IFilter $filter)
    {
        if($filter instanceof Filter){
            $this->combine($filter);
        } else {
            $this->filters[] = $filter;
        }
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function combine(Filter $filter)
    {
        $filters = $filter->getFilters();
        foreach($filters as $filter){
            $this->filters[] = $filter;
        }
    }

    public function filter($input)
    {
        foreach ($this->filters as $filter) {
            $input = $filter->filter($input);
        }

        return $input;
    }
}
