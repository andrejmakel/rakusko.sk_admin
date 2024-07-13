<?php

namespace App\Http\Requests;

use App\Models\Carousel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarouselRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('carousel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:carousels,id',
        ];
    }
}
