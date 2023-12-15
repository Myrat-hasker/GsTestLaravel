<?php

namespace App\Http\Requests;

use App\Rules\isCirillic;
use App\Rules\isCorectPhone;
use Illuminate\Foundation\Http\FormRequest;

class GsPostRequest extends FormRequest
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
            'name' => ['required', 'string', new isCirillic],
            'mobile_number' => ['required', new isCorectPhone],
            'email' => ['required', 'string', 'email'],
        ];
    }
}
