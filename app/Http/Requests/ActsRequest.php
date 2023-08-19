<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActsRequest extends FormRequest
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
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:acts,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:acts,slug,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:acts,order_key,NULL,id,deleted_at,NULL',

        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:acts,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:acts,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:acts,order_key,' . $this->route('id') . ',id,deleted_at,NULL',

        ];
    }
}
