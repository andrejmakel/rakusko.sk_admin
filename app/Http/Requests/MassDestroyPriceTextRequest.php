<?php

namespace App\Http\Requests;

use App\Models\PriceText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPriceTextRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('price_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:price_texts,id',
        ];
    }
}
