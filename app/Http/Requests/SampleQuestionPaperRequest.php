<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleQuestionPaperRequest extends FormRequest
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
            'title' => 'required|unique:sample_question_papers,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:sample_question_papers,slug,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:sample_question_papers,order_key,NULL,id,deleted_at,NULL',

        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:sample_question_papers,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:sample_question_papers,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:sample_question_papers,order_key,' . $this->route('id') . ',id,deleted_at,NULL',

        ];
    }
}
