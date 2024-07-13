<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tag_create');
    }

    public function rules()
    {
        return [
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
        ];
    }
}
