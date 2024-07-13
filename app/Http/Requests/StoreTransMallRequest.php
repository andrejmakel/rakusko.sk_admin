<?php

namespace App\Http\Requests;

use App\Models\TransMall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransMallRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trans_mall_create');
    }

    public function rules()
    {
        return [
            'lang_id' => [
                'nullable',
                'integer',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'origin_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
