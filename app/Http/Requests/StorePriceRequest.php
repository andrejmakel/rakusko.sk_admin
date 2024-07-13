<?php

namespace App\Http\Requests;

use App\Models\Price;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePriceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_create');
    }

    public function rules()
    {
        return [
            'price' => [
                'string',
                'required',
            ],
            'price_text_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
