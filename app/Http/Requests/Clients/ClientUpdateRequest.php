<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'last_name'   => 'required',
            'first_name'  => 'required',
            'middle_name' => 'required',
            'number'      => 'required|unique:clients,number,' . $this->client->id,
            'address'     => 'required',
            'phone'       => 'required',
        ];
    }
}
