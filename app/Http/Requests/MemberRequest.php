<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'member_type' => 'required|exists:member_types,id',
            'phone' => 'required|array|min:1',
            'phone.*.number' => 'required|string|max:20',
            'phone.*.type' => 'required|string|in:residential,office',
            'address' => 'required|string|max:255',
            'description' => 'nullable|max:10000',
            'image' => 'nullable|image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'member_email' => 'required|unique:member_types,title,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'member_email' => 'required|unique:member_types,title,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
