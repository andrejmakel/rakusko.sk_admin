<?php

namespace App\Http\Requests;

use App\Models\ShopCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShopCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shop_category_edit');
    }

    public function rules()
    {
        return [
            'title_sk' => [
                'string',
                'required',
                'unique:shop_categories,title_sk,' . request()->route('shop_category')->id,
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
