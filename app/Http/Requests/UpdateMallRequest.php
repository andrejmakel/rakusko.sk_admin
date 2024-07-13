<?php

namespace App\Http\Requests;

use App\Models\Mall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMallRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mall_edit');
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
                'unique:malls,slug,' . request()->route('mall')->id,
            ],
            'map_embed' => [
                'string',
                'required',
            ],
            'cover_img' => [
                'array',
            ],
            'subtitle' => [
                'string',
                'nullable',
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
