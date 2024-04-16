<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
        $id = $this->route('department.update'); // Assuming the route parameter name is 'faculty'

        return [
            'name' => ['required', 'min:3', 'unique:departments,name,' . $id],
            'code' => ['required'],
            'faculty_id' => ['required']

        ];
    }
}
