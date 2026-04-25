<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string|max:1000',
            'type'    => 'required|string|in:post,video',
            'id'      => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Le commentaire est obligatoire.',
            'type.required'    => 'Le type est obligatoire.',
            'id.required'      => 'L’identifiant est obligatoire.',
        ];
    }
}