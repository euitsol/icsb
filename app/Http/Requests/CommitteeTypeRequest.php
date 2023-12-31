<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeTypeRequest extends FormRequest
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
            'title' => 'required|unique:committee_types,title,NULL,id,deleted_at,NULL|max:255',
            'slug' => 'required|unique:committee_types,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:committee_types,title,' . $this->route('id') . ',id,deleted_at,NULL|max:255',
            'slug' => 'required|unique:committee_types,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
