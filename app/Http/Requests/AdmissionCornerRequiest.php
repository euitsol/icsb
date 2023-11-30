<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionCornerRequiest extends FormRequest
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
            'name' => 'required',
            'designation' => 'required',
            'telephone.*' => 'required',
            'pabx' => 'nullable',
            'status' => 'nullable|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'email' => 'required|unique:admission_corners,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|unique:admission_corners,phone,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:admission_corners,order_key,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=400,max_height=450,min_width=400,min_height=450',
        ];
    }

    protected function update(): array
    {
        return [
            'email' => 'required|unique:admission_corners,email,' . $this->route('id') . ',id,deleted_at,NULL',
            'phone' => 'required|unique:admission_corners,phone,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:admission_corners,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=400,max_height=450,min_width=400,min_height=450',
        ];
    }
}
