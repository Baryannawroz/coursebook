<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('stage.update'); // Assuming the route parameter name is 'faculty'

        return [
            'name' => ['required', 'min:3', 'unique:stages,name,' . $id],
            'code' => ['required'],
            'department_id' => ['required']

        ];
    }
}
