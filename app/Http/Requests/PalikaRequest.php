<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PalikaRequest extends FormRequest
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
			'code' => 'required|string',
			'name' => 'required|string',
			'name_ne' => 'required|string',
			'status' => 'required|boolean',
        ];
    }
}
