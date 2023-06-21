<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KlubRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $unique = Rule::unique('klubs')->ignore($this->id);

        return [
            'nama_klub' => ['required', 'string', 'max:150', 'unique:klubs'],
            'kota_klub' => ['required', 'string', 'max:100']
        ];
    }
}
