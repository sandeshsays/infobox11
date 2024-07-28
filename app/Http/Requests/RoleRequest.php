<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
    public function rules()
    {

        if(request()->method()=='POST'){
            return [
                'name_en' => 'required',
                'name_np' => 'required',
                'status' => 'required',
                'role_module' => 'required',
    
    
            ];
        }
        return [
            'name_en' => 'required',
            'name_np' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name_np.required' => trans('roles.role_name_nepali_required'),
            'name_en.required' => trans('roles.role_name_required'),

            'status.required' => trans('roles.status_required'),
            'role_module.required' => trans('roles.role_module_required'),
        ];
    }
}
