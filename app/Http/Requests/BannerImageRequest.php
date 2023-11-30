<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerImageRequest extends FormRequest
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

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'image|mimes:mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:max_width=1920,max_height=700,min_width=1920,min_height=700',
        ];
    }

    protected function update(): array
    {
        return [
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ];
    }
}
