<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssinedOfficerRequest extends FormRequest
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
            'status' => 'nullable|boolean',
            'branch_id' => 'required|exists:icsb_branches,id',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'email' => 'required|unique:assined_officers,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|unique:assined_officers,phone,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:assined_officers,order_key,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=400,max_height=450,min_width=400,min_height=450',
        ];
    }

    protected function update(): array
    {
        return [
            'email' => 'required|unique:assined_officers,email,' . $this->route('id') . ',id,deleted_at,NULL',
            'phone' => 'required|unique:assined_officers,phone,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:assined_officers,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=400,max_height=450,min_width=400,min_height=450',
        ];
    }
}