<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'cat_id' => 'required|exists:notice_categories,id',
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
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
