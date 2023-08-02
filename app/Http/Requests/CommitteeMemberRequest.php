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
            'description' => 'nullable',
            'status' => 'nullable|boolean',
            'member_id'=> 'required|exists:members,id',
            'cmt_id'=> 'required|exists:committee_member_types,id',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'committee_id'=> 'required|exists:committees,id',
        ];
    }

    protected function update(): array
    {
        return [
            'committee_id'=> 'nullable',
        ];
    }
}
