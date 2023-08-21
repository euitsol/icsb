<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouncilRequest extends FormRequest
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
            'duration.start_date' => 'required|date',
            'duration.end_date' => 'required|date',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:councils,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:councils,slug,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:councils,order_key,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:councils,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:councils,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:councils,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
