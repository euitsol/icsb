<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouncilMemberRequest extends FormRequest
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
            'status' => 'nullable|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'cm.*.description' => 'required',
            'cm.*.member_id' => 'required|exists:members,id',
            'cm.*.cmt_id' => 'required|exists:council_member_types,id',
            'cm.*.order_key' => 'required|unique:council_members,order_key,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        return [
            'description'=> 'required',
            'member_id'=> 'required|exists:members,id',
            'cmt_id'=> 'required|exists:council_member_types,id',
            'order_key'=> 'required|unique:council_members,order_key,' . $this->route('id') . ',id,deleted_at,NULL',
        ];
    }
}
