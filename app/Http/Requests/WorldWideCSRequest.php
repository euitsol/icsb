<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorldWideCSRequest extends FormRequest
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
            'description' => 'nullable',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:wwcs,title,NULL,id,deleted_at,NULL|max:255',
            'order_key' => 'required|unique:wwcs,order_key,NULL,id,deleted_at,NULL',
            'logo' => 'required|image|mimes:jpeg,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:wwcs,title,' . $this->route('id') . ',id,deleted_at,NULL|max:255',
            'order_key' => 'required|unique:wwcs,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
            'logo' => 'nullable|image|mimes:jpeg,jpg,gif,svg|max:2048',
        ];
    }
}
