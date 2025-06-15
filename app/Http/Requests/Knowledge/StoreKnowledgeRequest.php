<?php

namespace App\Http\Requests\Knowledge;

use Illuminate\Foundation\Http\FormRequest;

class StoreKnowledgeRequest extends FormRequest
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
            'topic_id' => ['required', 'integer', 'exists:topics,id'],
            'sub_topic_id' => ['required', 'integer', 'exists:sub_topics,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],

            'attachments' => ['nullable', 'array'],
            'attachments.*' => [
                'file',
                'mimes:jpg,jpeg,png,gif,pdf,doc,docx',
                'max:5120' // max 5MB per file, adjust as needed
            ],

            'reference_urls' => ['nullable', 'array'],
            'reference_urls.*' => ['nullable', 'url'],
        ];
    }


}
