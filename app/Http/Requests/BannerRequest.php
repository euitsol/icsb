<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'from_time' => 'nullable',
            'to_time' => 'nullable',
            'status' => 'nullable|boolean',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'banner_name' => 'required|unique:banners,banner_name,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'banner_name' => 'required|unique:banners,banner_name,' . $this->route('id') . ',id,deleted_at,NULL',

        ];
    }
}
