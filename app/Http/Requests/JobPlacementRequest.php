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
            'job_type' => 'required|array',
            'job_type.*' => 'integer|min:0',
            'salary' => 'required|array',
            // 'salary.from' => 'required|numeric|min:0',
            // 'salary.to' => 'required|numeric|min:0',
            // 'salary.*' => 'integer|min:0',
            'salary_type' => [
                'required',
                Rule::in(['Per Month', 'Per Year']),
            ],

            'deadline' => 'required|date',
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