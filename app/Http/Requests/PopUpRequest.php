<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopUpRequest extends FormRequest
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
            'url' => 'nullable|url',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=1200,min_height=800',
            'order_key' => 'required|unique:pop_up,order_key,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=1200,min_height=800',
            'order_key' => 'required|unique:pop_up,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
