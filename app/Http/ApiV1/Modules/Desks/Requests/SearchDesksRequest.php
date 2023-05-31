<?php

namespace App\Http\ApiV1\Modules\Desks\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchDesksRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sort' => 'array',
            'filter' => 'array',
            'pagination.limit' => 'int|min:0',
            'pagination.offset' => 'int|min:0',
        ];
    }
}
