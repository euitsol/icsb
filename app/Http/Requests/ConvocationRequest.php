<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvocationRequest extends FormRequest
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
            'description' => 'nullable|max:10000',
            'status' => 'nullable|boolean',
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:convocations,title,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:convocations,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
