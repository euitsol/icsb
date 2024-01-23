<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\SalaryRangeRule;

class JobPlacementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'company_name' => 'required',
            'application_url' => 'nullable|url',
            'email' => 'required|email',
            'vacancy' => 'required|numeric',
            'category' => [
                'required',
                Rule::in(['Per Month', 'Per Year','Negotiable']),
            ],
            'job_type' => [
                'required',
                Rule::in(["Company Secretary", "HR Jobs","Other Jobs"]),
            ],
            // 'salary' => 'nullable|array',
            // 'salary.from' => 'required|numeric|min:0',
            // 'salary.to' => 'required|numeric|min:0',
            // 'salary.*' => 'integer|min:0',
            'salary' => 'array',
            'salary.*' => [
                new SalaryRangeRule,
            ],
            'salary_type' => [
                'required',
                Rule::in(['Per Month', 'Per Year','Negotiable']),
            ],

            'deadline' => 'required|date|after_or_equal:today',
            'company_address'=>'required|max:300',
            'job_responsibility'=>'required',
           ' additional_requirement'=>'nullable',
            'job_location'=>'required|max:300',
           ' other_benefits'=>'nullable',
            'special_instractions'=>'nullable',
            'educational_requirement'=>'nullable',
            'professional_requirement'=>'nullable',
            'experience_requirement'=>'nullable',
            'age_requirement'=>'nullable',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [

        ];
    }

    protected function update(): array
    {
        return [

        ];
    }
}
