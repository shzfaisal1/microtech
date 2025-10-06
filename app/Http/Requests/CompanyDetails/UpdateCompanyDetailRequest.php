<?php

namespace App\Http\Requests\CompanyDetails;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyDetailRequest extends FormRequest
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
            'company_name'     => 'required|string|max:155',
            'contact_num'      => 'required',
            'contact_num1'     => 'nullable',
            'email_id'         => 'nullable|email|max:155',
            'email_id1'        => 'nullable|email|max:155',
        ];
    }
}
