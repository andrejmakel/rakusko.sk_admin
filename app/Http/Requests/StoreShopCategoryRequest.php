<?php

namespace App\Http\Requests;

use App\Models\ShopCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShopCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shop_category_create');
    }

    public function rules()
    {
        return [
            'title_sk' => [
                'string',
                'required',
                'unique:shop_categories',
            ],
            'title_de' => [
                'string',
                'nullable',
            ],
            'title_cs' => [
                'string',
                'nullable',
            ],
            'title_hu' => [
                'string',
                'nullable',
            ],
            'title_sl' => [
                'string',
                'nullable',
            ],
        ];
    }
}
