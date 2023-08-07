<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretarialStandardRequest extends FormRequest
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

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:secretarial_standards,title,NULL,id,deleted_at,NULL',
            'short_title' => 'required|unique:secretarial_standards,short_title,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:png',
            'file.*.file_path' => 'required|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'required|string',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:secretarial_standards,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'short_title' => 'required|unique:secretarial_standards,short_title,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:png',
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
        ];
    }
}
