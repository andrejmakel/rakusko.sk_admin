<?php

namespace App\Http\Requests;

use App\Models\TransPlace;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransPlaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trans_place_create');
    }

    public function rules()
    {
        return [
             'lang_id' => [
                'nullable',
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
                'unique:trans_places',
            ], 
            'origin_id' => [
                'required',
                'integer',
            ], 
        ];
    }
}
