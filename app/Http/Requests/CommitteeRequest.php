<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeRequest extends FormRequest
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
            'committee_type' => 'required|exists:committee_types,id',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:committees,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:committees,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:committees,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:committees,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
