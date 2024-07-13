<?php

namespace App\Http\Requests;

use App\Models\TransPlace;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransPlaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trans_place_edit');
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
            'title' => [
                'string',
                'nullable',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'slug' => [
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
