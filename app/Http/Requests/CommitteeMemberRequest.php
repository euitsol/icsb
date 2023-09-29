<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeMemberRequest extends FormRequest
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
            'cm.*.member_id' => 'required|exists:members,id',
            'cm.*.cmt_id' => 'required|exists:committee_member_types,id',
            'cm.*.order_key' => 'required',
        ];
    }

    protected function update(): array
    {
        return [
            'member_id'=> 'required|exists:members,id',
            'cmt_id'=> 'required|exists:committee_member_types,id',
            'order_key' => 'required',
        ];
    }
}
