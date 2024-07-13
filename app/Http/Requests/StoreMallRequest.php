<?php

namespace App\Http\Requests;

use App\Models\Mall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMallRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mall_create');
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
            'map_embed' => [
                'string',
                'nullable',
            ],
            'cover_img' => [
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
        ];
    }
}
