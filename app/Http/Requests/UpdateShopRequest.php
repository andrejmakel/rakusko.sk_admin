<?php

namespace App\Http\Requests;

use App\Models\Shop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shop_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
            'discount' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'nullable',
            ],
            'openings.*' => [
                'integer',
            ],
            'openings' => [
                'array',
            ],
            'gallery' => [
                'array',
            ],
            'zip' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'update' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'mall_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
