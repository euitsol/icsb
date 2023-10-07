<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'company_url' => 'required|url',
            'application_url' => 'nullable|url',
            'email' => 'required|email',
            'vacancy' => 'required|numeric',
            'job_type' => [
                'required',
                Rule::in(["Full-Time", "Part-Time","Work From Home", "Contractual","Intern"]),
            ],
            'salary' => 'required|array',
            // 'salary.from' => 'required|numeric|min:0',
            // 'salary.to' => 'required|numeric|min:0',
            // 'salary.*' => 'integer|min:0',
            'salary_type' => [
                'required',
                Rule::in(['Per Month', 'Per Year']),
            ],

            'deadline' => 'required|date',
            'company_address'=>'required',
            'job_responsibility'=>'required',
           ' additional_requirement'=>'nullable',
            'job_location'=>'required',
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
