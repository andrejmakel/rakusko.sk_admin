<?php

namespace App\Http\Requests;

use App\Models\Opening;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOpeningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opening_create');
    }

    public function rules()
    {
        return [
            'open_hours' => [
                'string',
                'nullable',
            ],
            'open_text_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
