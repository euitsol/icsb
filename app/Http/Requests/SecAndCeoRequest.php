<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SecAndCeoRequest extends FormRequest
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
            'bio' => 'required',
            // 'designation' => 'required',
            'message' => 'nullable',
            'status' => 'nullable|boolean',
            'duration.*.end_date' => 'nullable|date',


        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'member_id' => 'required|exists:members,id|unique:sec_and_ceos,member_id,NULL,id,deleted_at,NULL',
            'slug' => 'required|unique:sec_and_ceos,slug,NULL,id,deleted_at,NULL',
            'duration.*.start_date' => 'required|date',
        ];
    }

    protected function update(): array
    {
        $currentMemberId = $this->get('member_id');
        $scId = $this->route('id');
        return [
            'member_id' => [
                'required',
                'exists:members,id',
                Rule::unique('sec_and_ceos')->ignore($scId, 'id')->where(function ($query) use ($currentMemberId) {
                    return $query->where('member_id', $currentMemberId);
                }),
            ],
            'slug' => 'required|unique:sec_and_ceos,slug,' . $this->route('id') . ',id,deleted_at,NULL',
            'duration.*.start_date' => 'nullable|date',
        ];
    }
}
