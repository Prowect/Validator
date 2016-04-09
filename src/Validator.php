<?php

namespace Drips\Validator;

class Validator implements IValidator
{
    protected $validators = array();

    public function add(IValidator $validator)
    {
        $this->validators[] = $validator;
    }

    public function validate($input)
    {
        $results = array();
        foreach ($this->validators as $validator) {
            $result = $validator->validate($input);
            $results[get_class($validator)] = $result;
        }

        return $results; // array_product => true/false
    }
}
