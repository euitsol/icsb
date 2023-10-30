<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Contracts\Validation\DataAwareRule;

class SalaryRangeRule  implements InvokableRule, DataAwareRule
{
    public function setData(array $data): static
    {
        $this->data = $data;
 
        return $this;
    }
    public function __invoke($attribute, $value, $fail)
    {

        if(isset($this->data['salary_type']) && $this->data['salary_type'] != 'Negotiable'){
            if(!isset($value) || empty($value)){
                $fail(ucfirst($attribute).' is required');
            }
        }
    }
}
