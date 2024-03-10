<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CsFirmsRequest extends FormRequest
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
            'csf_member.*.ppcn' => 'required',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'csf_member.*.member_id' => 'required|exists:members,id|unique:cs_firms,member_id,NULL,id,deleted_at,NULL',
        ];
    }

    protected function update(): array
    {
        $currentMemberId = $this->get('csf_member')['member_id'];
        $csf_id = $this->route('id');

        return [
            'csf_member.member_id' => [
                'required',
                'exists:members,id',
                Rule::unique('cs_firms', 'member_id')
                    ->ignore($csf_id, 'id')
                    ->where(function ($query) use ($currentMemberId) {
                        return $query->where('member_id', $currentMemberId);
                    }),
            ],
        ];
    }
}
