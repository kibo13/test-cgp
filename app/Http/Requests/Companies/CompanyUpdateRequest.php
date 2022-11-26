<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'name'          => 'required',
            'number'        => 'required|unique:companies,number,' . $this->company->id,
            'director'      => 'required',
            'registered_at' => 'required',
            'account'       => 'required',
            'address'       => 'required',
        ];
    }
}
