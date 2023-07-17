<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_time' => 'required|date_format:H:i',
            'event_date' => 'required|date',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:events,title,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:events,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
