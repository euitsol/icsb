<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LatestNewsRequest extends FormRequest
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
            'description' => 'required',
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
            'date' => 'required | date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1200,max_height=800,min_width=1200,min_height=800',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:latest_newses,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:latest_newses,slug,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:latest_newses,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:latest_newses,slug,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
