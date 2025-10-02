<?php

namespace App\Http\Requests\CompanyDetails;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyDetailRequest extends FormRequest
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
            'print_as'         => 'nullable|string|max:155',
            'print_as1'        => 'nullable|string|max:155',
            'company_prefix'   => 'required|string|max:155',
            'email_id'         => 'nullable|email|max:155',
            'email_id1'        => 'nullable|email|max:155',
            'address'          => 'nullable|string',
            'city'             => 'nullable|string|max:255',
            'fax'              => 'nullable|string|max:255',
            'country'          => 'nullable|string|max:255',
            'web_address'      => 'required|max:155',
            'state'            => 'nullable|string|max:255',
            'vat_tin'          => 'nullable|string|max:255',
            'vat_tin_date'     => 'nullable|date',
            'pan_no'           => 'nullable|string|max:255',
            'cst_tin'          => 'nullable|string|max:255',
            'cst_tin_date'     => 'nullable|date',
            'pt_no'            => 'nullable|string|max:255',
            'service_tax'      => 'nullable|string|max:255',
            'subject_jur'      => 'nullable|string|max:255',
            'license_no'       => 'nullable|string|max:255',
            'license_no1'      => 'nullable|string|max:255',
            'sale_invoice'     => 'nullable|string|max:255',
        ];
    }
}
