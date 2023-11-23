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
            'designation' => 'nullable|max:255',
            'member_type' => 'nullable|exists:member_types,id',
            'phone' => 'nullable|array|min:1',
            'phone.*.number' => 'nullable|string|max:20',
            'phone.*.type' => 'nullable|string|in:residential,office',
            'address' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'member_email' => 'nullable|unique:members,email,NULL,id,deleted_at,NULL',
            'membership_id' => 'nullable',


        ];
    }

    protected function update(): array
    {
        return [
            'member_email' => 'nullable|unique:members,email,' . $this->route('id') . ',id,deleted_at,NULL',
            'membership_id' => 'nullable',

        ];
    }
}
