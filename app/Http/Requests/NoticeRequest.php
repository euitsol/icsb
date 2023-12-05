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
            'title' => 'required',
            'status' => 'nullable|boolean',
            'cat_id' => 'required|exists:notice_categories,id',
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
            'test_mail'=>'nullable|email',
            'phone'=>'nullable|max:11|min:11',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'slug' => 'required|unique:notices,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'slug' => 'required|unique:notices,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
