<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            // 'location' => $this->input('location') ? 'required' : 'nullable',
            // 'social' => $this->input('social') ? 'required' : 'nullable',
            // 'phone' => $this->input('phone') ? 'required' : 'nullable',
            // 'email' => $this->input('email') ? 'required' : 'nullable',
            // 'location' => [
            //     'nullable',
            //     'array',
            //     'required_if:is_location,true',
            //     'json',
            // ],
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
