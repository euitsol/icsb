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
            'description' => 'required|srting|max:10000',
            'event_start_time' => 'required|date|date_format:Y-m-d H:i:s',
            'event_end_time' => 'required|date|date_format:Y-m-d H:i:s',
            'total_participant' => 'required|numeric',
            'event_location' => 'required',
            'video_url' => 'nullable',
            'status' => 'nullable|boolean',

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
