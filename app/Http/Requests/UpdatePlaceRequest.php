<?php

namespace App\Http\Requests;

use App\Models\Place;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('place_edit');
    }

    public function rules()
    {
        return [
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
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
        ];
    }
}
