<?php

namespace App\Http\Requests;

use App\Models\OpeningText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOpeningTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opening_text_edit');
    }

    public function rules()
    {
        return [
            'sk' => [
                'string',
                'nullable',
            ],
            'de' => [
                'string',
                'nullable',
            ],
            'cs' => [
                'string',
                'nullable',
            ],
            'hu' => [
                'string',
                'nullable',
            ],
            'sl' => [
                'string',
                'nullable',
            ],
        ];
    }
}
