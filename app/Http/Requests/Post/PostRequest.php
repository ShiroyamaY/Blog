<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'content' => ['required','string','max:10000'],
            'category' => ['nullable','string','exists:categories,id'],
            'tags' => ['nullable','array'],
            'tags.*' => ['nullable','integer','exists:tags,id']
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'This field is required.',
            'title.string' => 'Data must be of string type',
            'category_id.required' => 'This field is required.',
            'category_id.integer' => 'Category ID must be a number',
            'category_id.exists' => 'Category ID must be in the database',
            'tags.array' => 'It is necessary to send a data array',
        ];
    }
}
