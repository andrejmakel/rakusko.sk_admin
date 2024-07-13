<?php

namespace App\Http\Requests;

use App\Models\Navi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNaviRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('navi_create');
    }

    public function rules()
    {
        return [
            'description' => [
                'string',
                'nullable',
            ],
            'titel_1' => [
                'string',
                'nullable',
            ],
            'titel_2' => [
                'string',
                'nullable',
            ],
            'titel_3' => [
                'string',
                'nullable',
            ],
            'titel_4' => [
                'string',
                'nullable',
            ],
            'titel_5' => [
                'string',
                'nullable',
            ],
            'coordinates' => [
                'string',
                'nullable',
            ],
            'zoom' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
