<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
            // 'file.*.file_path' => 'nullable|file|required_if:file.*.file_name,!=,null|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            // 'file.*.file_name' => 'nullable|string|required_if:file.*.file_path,!=,null',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:blogs,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:blogs,slug,NULL,id,deleted_at,NULL',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:blogs,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:blogs,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
