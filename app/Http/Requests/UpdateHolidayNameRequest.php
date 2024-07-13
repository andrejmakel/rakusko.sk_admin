<?php

namespace App\Http\Requests;

use App\Models\HolidayName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHolidayNameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('holiday_name_edit');
    }

    public function rules()
    {
        return [
            'title_sk' => [
                'string',
                'nullable',
            ],
            'title_cs' => [
                'string',
                'nullable',
            ],
            'title_de' => [
                'string',
                'nullable',
            ],
            'title_hu' => [
                'string',
                'nullable',
            ],
            'title_sl' => [
                'string',
                'nullable',
            ],
        ];
    }
}
