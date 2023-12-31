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
            'order_key' => 'required|unique:national_connections,order_key,NULL,id,deleted_at,NULL',
            'logo' => 'required|image|mimes:jpeg,jpg,gif,svg|max:2048|dimensions:max_width=126,max_height=126,min_width=126,min_height=126',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:national_connections,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:national_connections,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
            'logo' => 'nullable|image|mimes:jpeg,jpg,gif,svg|max:2048|dimensions:max_width=126,max_height=126,min_width=126,min_height=126',
        ];
    }
}
