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
            'description' => 'nullable',
            'file.*.file_path' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            'file.*.file_name' => 'nullable|string',
            'program_date'=>'required|date',
            // 'file.*.file_path' => 'nullable|file|required_if:file.*.file_name,!=,null|mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp',
            // 'file.*.file_name' => 'nullable|string|required_if:file.*.file_path,!=,null',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|unique:media_rooms,title,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:media_rooms,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
