<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfoRequest extends FormRequest
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
            'address_page_image' => 'nullable|image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=1200,max_height=800,min_width=1200,min_height=800',
            'location.*.title' => 'required',
            'location.*.address' => 'required',
            'location.*.url' => 'required|url',
            'location.*.emails.*' => 'required|email',
            'location.*.phones.*.number' => 'required',
            'location.*.phones.*.type' => 'required',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [];
    }

    protected function update(): array
    {
        return [];
    }
}
