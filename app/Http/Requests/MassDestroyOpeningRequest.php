<?php

namespace App\Http\Requests;

use App\Models\Opening;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOpeningRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('opening_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:openings,id',
        ];
    }
}
