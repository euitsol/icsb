<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Embed\Rules\EmbeddableUrl;
use BenSampo\Embed\Services\YouTube;
use BenSampo\Embed\Services\Vimeo;



class RecentVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => [
                'required',
                'url',
                (new EmbeddableUrl)->allowedServices([
                    YouTube::class,
                    Vimeo::class
                ])
            ],
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
