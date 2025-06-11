<?php

namespace App\Http\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ];
    }

        public function messages(): array
    {
        return [
            'user_id.required' => 'कृपया प्रयोगकर्ता चयन गर्नुहोस्।',
            'user_id.exists' => 'चयन गरिएको प्रयोगकर्ता प्रणालीमा फेला परेन।',

            'name.required' => 'कृपया शीर्षकको नाम लेख्नुहोस्।',
            'name.string' => 'नाम मान्य स्ट्रिङ हुनुपर्छ।',
            'name.max' => 'नाम २५५ वर्णभन्दा बढी हुन सक्दैन।',

            'sort_order.required' => 'कृपया क्रमाङ्क लेख्नुहोस्।',
            'sort_order.integer' => 'क्रमाङ्क संख्या हुनुपर्छ।',
            'sort_order.min' => 'क्रमाङ्क शून्य वा त्यसभन्दा बढी हुनुपर्छ।',

            'status.required' => 'कृपया स्थिति चयन गर्नुहोस्।',
            'status.in' => 'स्थिति मान्य हुनुपर्छ (० वा १)।',
        ];
    }
    
}
