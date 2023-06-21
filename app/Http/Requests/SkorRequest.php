<?php

namespace App\Http\Requests;

use App\Models\Skor_pertandingan;
use illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SkorRequest extends FormRequest
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
        // $validator->after(function($validator) {
        //     $id_klub1 = $this->input('id_klub1');
        //     $id_klub2 = $this->input('id_klub2');

        //     $existingData = Skor_pertandingan::where('id_klub1', $id_klub1)
        //         ->where('id_klub2', $id_klub2)
        //         ->first();

        //     if ($existingData) {
        //         $validator->error()->add('id_klub1', 'Data pertandingan sudah ada, data tidak boleh duplikat.');
        //     }
        // });

        return [
            'id_klub1' => ['required'],
            'id_klub2' => ['required'],
            'skor_1' => ['required', 'numeric'],
            'skor_2' => ['required', 'numeric'],
        ];
    }
}
