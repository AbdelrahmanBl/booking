<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:64|unique:employees',
            'password' => 'required|string|min:6|max:16|confirmed',
            'is_active' => 'required|boolean',
        ];

        if($this->isMethod('PATCH')) {
            $rules = array_merge($rules, [
                'email' => 'required|email|max:64|unique:employees,email,' . $this->route()->user->id,
            ]);

            if(! $this->password) {
                unset($rules['password']);
            }
        }

        return $rules;
    }
}
