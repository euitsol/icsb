<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeMemberTypeRequest extends FormRequest
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
            'description' => 'nullable',
            'status' => 'nullable|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:committee_member_types,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:committee_member_types,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:committee_member_types,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:committee_member_types,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
