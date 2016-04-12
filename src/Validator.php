<?php

namespace Drips\Validator;

class Validator implements IValidator
{
    protected $validators = array();

    public function add(IValidator $validator)
    {
        if($validator instanceof Validator){
            $this->combine($validator);
        } else {
            $this->validators[] = $validator;
        }
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function combine(Validator $validator)
    {
        $validators = $validator->getValidators();
        foreach($validators as $validator){
            $this->validators[] = $validator;
        }
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
