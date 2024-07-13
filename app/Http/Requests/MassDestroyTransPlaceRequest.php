<?php

namespace App\Http\Requests;

use App\Models\TransPlace;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransPlaceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trans_place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trans_places,id',
        ];
    }
}
