<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NationalConnectionRequest extends FormRequest
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
            'url' => 'required|url',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:national_connections,title,NULL,id,deleted_at,NULL',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:national_connections,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
