<?php

namespace App\Http\Requests;

use App\Models\Opening;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOpeningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opening_edit');
    }

    public function rules()
    {
        return [
            'open_hours' => [
                'string',
                'required',
            ],
            'open_text_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
