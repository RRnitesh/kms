<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'नाम आवश्यक छ।',
            'name.string'       => 'नाम अक्षरमा हुनुपर्छ।',
            'name.max'          => 'नाम २५५ वर्णभन्दा बढी हुनुहुँदैन।',

            'email.required'    => 'इमेल आवश्यक छ।',
            'email.email'       => 'मान्य इमेल ठेगाना प्रविष्ट गर्नुहोस्।',
            'email.unique'      => 'यो इमेल पहिल्यै प्रयोग भइसकेको छ।',

            'password.required' => 'पासवर्ड आवश्यक छ।',
            'password.string'   => 'पासवर्ड अक्षरमा हुनुपर्छ।',
            'password.min'      => 'पासवर्ड कम्तीमा ६ वर्णको हुनुपर्छ।',
        ];
    }
}
