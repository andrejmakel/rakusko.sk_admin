<?php

namespace App\Http\Requests;

use App\Models\Mall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMallRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:malls,id',
        ];
    }
}
