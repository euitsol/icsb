<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Embed\Rules\EmbeddableUrl;
use BenSampo\Embed\Services\YouTube;
use BenSampo\Embed\Services\Vimeo;

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
            'description' => 'required',
            'event_start_time' => 'required',
            'event_end_time' => 'nullable',
            'total_participant' => 'nullable|numeric',
            'event_location' => 'required',
            'status' => 'nullable|boolean',
            'type' => 'required|in:1,0',
            'video_url' => [
                'nullable',
                'url',
                (new EmbeddableUrl)->allowedServices([
                    YouTube::class,
                    Vimeo::class
                ])
            ],
            'test_mail'=>'nullable|email',
            'phone'=>'nullable|max:11|min:11',

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
            'image.*' => 'image|mimes:mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1200,max_height=800,min_width=1200,min_height=800',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:events,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:events,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|array',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1200,max_height=800,min_width=1200,min_height=800',
        ];
    }
}
