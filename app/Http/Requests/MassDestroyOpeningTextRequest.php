<?php

namespace App\Http\Requests;

use App\Models\OpeningText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOpeningTextRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('opening_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:opening_texts,id',
        ];
    }
}
