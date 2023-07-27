<?php

namespace App\Http\Requests\Letter;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required',
            'code_agenda' => 'required',
            'date' => 'required|date',
            'from' => 'required',
            'regarding' => 'required',
            'unit_id' => 'required|exists:units,id',
            'letter_type_id' => 'required|exists:letter_types,id',
            'status' => 'required|in:Surat Masuk,Surat Keluar',
        ];
    }
}
