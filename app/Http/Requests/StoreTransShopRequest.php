<?php

namespace App\Http\Requests;

use App\Models\TransShop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransShopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trans_shop_create');
    }

    public function rules()
    {
        return [
            'lang_id' => [
                'required',
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
