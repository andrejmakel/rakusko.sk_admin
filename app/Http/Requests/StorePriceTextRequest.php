<?php

namespace App\Http\Requests;

use App\Models\PriceText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePriceTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_text_create');
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
