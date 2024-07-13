<?php

namespace App\Http\Requests;

use App\Models\HolidayName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHolidayNameRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('holiday_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:holiday_names,id',
        ];
    }
}
