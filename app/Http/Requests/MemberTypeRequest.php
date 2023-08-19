<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberTypeRequest extends FormRequest
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
            'description' => 'nullable|max:10000',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:member_types,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:member_types,slug,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:member_types,order_key,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:member_types,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:member_types,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:member_types,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
