<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NationalAwardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => 'nullable|max:10000',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:national_awards,title,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:national_awards,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
        ];
    }
}
