<?php

namespace App\Http\Requests;

use App\Models\Holiday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHolidayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('holiday_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
