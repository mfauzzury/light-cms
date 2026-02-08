<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create_contents');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', Rule::in(['page', 'post'])],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:contents,slug', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'content_json' => ['required', 'array'],
            'content_json.blocks' => ['required', 'array'],
            'content_json.blocks.*.type' => ['required', 'string', Rule::in([
                'header', 'paragraph', 'list', 'quote', 'code', 'table', 'image', 'embed'
            ])],
            'status' => ['required', 'string', Rule::in(['draft', 'published', 'archived'])],
            'published_at' => ['nullable', 'date'],
            'author_id' => ['required', 'exists:users,id'],

            // SEO fields
            'meta_title' => ['nullable', 'string', 'max:60'],
            'meta_description' => ['nullable', 'string', 'max:160'],
            'canonical_url' => ['nullable', 'url', 'max:255'],
            'og_title' => ['nullable', 'string', 'max:60'],
            'og_description' => ['nullable', 'string', 'max:160'],
            'og_type' => ['required', 'string', Rule::in(['article', 'website'])],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'slug.regex' => 'The slug must only contain lowercase letters, numbers, and hyphens.',
            'content_json.blocks.*.type.in' => 'Invalid block type. Only allowed block types are permitted.',
        ];
    }
}
