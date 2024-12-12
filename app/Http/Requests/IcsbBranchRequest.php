<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IcsbBranchRequest extends FormRequest
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
            'address' => 'nullable|string',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'name' => 'required|unique:icsb_branches,name,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:icsb_branches,slug,NULL,id,deleted_at,NULL',
            'email' => 'nullable|unique:icsb_branches,email,NULL,id,deleted_at,NULL',
            'phone' => 'nullable|unique:icsb_branches,phone,NULL,id,deleted_at,NULL',
            'order_key' => 'required|unique:icsb_branches,order_key,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'required|unique:icsb_branches,name,' . $this->route('id') . ',id,deleted_at,NULL',
            'slug' => 'required|unique:icsb_branches,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'email' => 'nullable|unique:icsb_branches,email,' . $this->route('id') . ',id,deleted_at,NULL',
            'phone' => 'nullable|unique:icsb_branches,phone,' . $this->route('id') . ',id,deleted_at,NULL',
            'order_key' => 'required|unique:icsb_branches,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}