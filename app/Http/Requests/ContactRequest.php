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
