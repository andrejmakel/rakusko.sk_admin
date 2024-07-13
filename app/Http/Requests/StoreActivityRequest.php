<?php

namespace App\Http\Requests;

use App\Models\Activity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActivityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('activity_create');
    }

    public function rules()
    {
        return [
            'order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cover_img' => [
                'array',
            ],
            'title_sk' => [
                'string',
                'required',
            ],
            'title_de' => [
                'string',
                'required',
            ],
            'title_cs' => [
                'string',
                'required',
            ],
            'title_hu' => [
                'string',
                'required',
            ],
            'title_sl' => [
                'string',
                'required',
            ],
            'slug_sk' => [
                'string',
                'required',
            ],
            'slug_de' => [
                'string',
                'required',
            ],
            'slug_cs' => [
                'string',
                'required',
            ],
            'slug_hu' => [
                'string',
                'required',
            ],
            'slug_sl' => [
                'string',
                'required',
            ],
        ];
    }
}
