<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'projectId' => ['required', 'exists:projects,id'],
            'documents' => ['required', 'array'],
            'documents.*.name' => ['required', 'string'],
            'documents.*.data' => ['required', 'array'],
            'documents.*.data.*.key' => ['required', 'string'],
            'documents.*.data.*.value' => ['required', 'string']
        ];
    }
}
