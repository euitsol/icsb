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
            'event_start_time' => 'required',
            'event_end_time' => 'required',
            'total_participant' => 'required|numeric',
            'event_location' => 'required',
            'video_url' => 'nullable|url',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:events,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:events,slug,NULL,id,deleted_at,NULL',
            'image' => 'required|array',
            'image.*' => 'image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:events,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:events,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|array',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|in:1,0',
        ];
    }
}
