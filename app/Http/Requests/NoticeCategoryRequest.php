<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeCategoryRequest extends FormRequest
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
            'title' => 'required|unique:notice_categories,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:notice_categories,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:notice_categories,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:notice_categories,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
