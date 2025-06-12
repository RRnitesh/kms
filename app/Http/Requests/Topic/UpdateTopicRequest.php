<?php

namespace App\Http\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name'   => ['required', 'regex:/^[A-Za-z\s]+$/', 'string', 'max:255'],
            'status' => ['required', 'boolean'], // accepts true/false or 1/0
        ];
        
    }
        public function messages(): array
    {
        return [
            'name.required'   => 'The topic name is required.',
            'name.string'     => 'The topic name must be a string.',
            'name.max'        => 'The topic name must not exceed 255 characters.',
            'status.required' => 'Please select a status.',
            'status.boolean'  => 'The status must be either active or inactive.',
        ];
    }
}
