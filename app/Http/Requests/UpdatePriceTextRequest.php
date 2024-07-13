<?php

namespace App\Http\Requests;

use App\Models\PriceText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePriceTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_text_edit');
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
