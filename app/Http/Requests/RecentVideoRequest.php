<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecentVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|url',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:recent_videos,title,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:recent_videos,title,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
