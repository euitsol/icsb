<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|max:170',
            'description' => 'required|string|max:10000',
        ];

        if ($this->isMethod('POST')) {

        } else {
            $id = $this->route('id');
            $rules['title'] .= '|faqs,title,' . $id."id";
        }

        return $rules;
    }
    public function attributes()
    {
        return [
            'title' => 'Faq title',
            'description' => 'Faq Description',
        ];
    }
}
