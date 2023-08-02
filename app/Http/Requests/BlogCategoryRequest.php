<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'name' => 'required|unique:blog_categories,name,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:blog_categories,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'required|unique:blog_categories,name,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:blog_categories,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
