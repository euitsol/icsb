<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRoomRequest extends FormRequest
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
            'file.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
            'program_date'=>'required|date',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=1200,max_height=800,min_width=1200,min_height=800',
            'category_id' => 'required|exists:media_room_categories,id',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|unique:media_rooms,title,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:media_rooms,slug,NULL,id,deleted_at,NULL',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1920,max_height=700,min_width=1920,min_height=700',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:media_rooms,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:media_rooms,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1920,max_height=700,min_width=1920,min_height=700',
        ];
    }
}
