<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelinfoRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'module_title' => 'required|string|max:255',
            'module_type' => 'required|string|max:255',
            'module_code' => 'required|string|max:255',
            'credits' => 'required|numeric',
            'module_level' => 'required|string|max:255',
            'semester_of_delivery' => 'required|numeric|max:255',

            'module_leader' => 'required|string|max:255',
            'module_leader_email' => 'required|email|max:255',
            'module_leader_academic_title' => 'required|string|max:255',
            'module_leader_qualification' => 'required|string|max:255',
            'module_tutor_name' => 'required|string|max:255',
            'module_tutor_email' => 'required|email|max:255',
            'peer_reviewer_name' => 'required|string|max:255',
            'peer_reviewer_email' => 'required|email|max:255',
            'approval_date' => 'required|date',
            'version_number' => 'required|numeric|max:255',
            'subject_id' => 'required|numeric',
            'stage_id' => 'required|numeric',
        ];
    }
}
