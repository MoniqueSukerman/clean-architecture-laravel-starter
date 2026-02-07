<?php

namespace App\Infrastructure\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:55',
            'description' => 'required|string|max:255',
            'status' => 'required|in:pendente,em_andamento,concluido',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório',
            'title.string' => 'O título deve ser uma string',
            'title.max' => 'O título deve ter no máximo 55 caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.string' => 'A descrição deve ser uma string',
            'description.max' => 'A descrição deve ter no máximo 255 caracteres',
            'status.required' => 'O status é obrigatório',
            'status.in' => 'O status deve ser pendente, em_andamento ou concluido',
        ];
    }
}
