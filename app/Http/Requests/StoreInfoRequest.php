<?php

namespace App\Http\Requests;

use App\Models\Info;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInfoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('info_create');
    }

    public function rules()
    {
        return [
            'cover_img' => [
                'array',
            ],
            'update' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
        ];
    }
}
