<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamFaqRequest extends FormRequest
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
            'description' => 'required|max:10000',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:exam_faqs,title,NULL,id,deleted_at,NULL',
            'order_key' => 'required|integer|unique:exam_faqs,order_key,NULL,id,deleted_at,NULL'

        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:exam_faqs,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|integer|unique:exam_faqs,order_key,' . $this->route('id') . ',id,deleted_at,NULL'
        ];
    }
}
