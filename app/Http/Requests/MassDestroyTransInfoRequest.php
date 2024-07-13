<?php

namespace App\Http\Requests;

use App\Models\TransInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trans_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trans_infos,id',
        ];
    }
}
