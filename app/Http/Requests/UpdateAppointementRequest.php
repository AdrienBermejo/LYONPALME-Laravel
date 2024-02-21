<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointementRequest extends FormRequest
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
            //
            'horairedebut' => 'required|date',
            'horairefin' => 'required|date|after:horairedebut',
            'Validation' => 'required|boolean',
            'Comment' => 'nullable|string',
            'Commentaire' => 'nullable|string',
        ];
    }
}
