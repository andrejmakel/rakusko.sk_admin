<?php

namespace App\Http\Requests;

use App\Models\Carousel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarouselRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carousel_create');
    }

    public function rules()
    {
        return [
            'cover_img' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'btn_1' => [
                'string',
                'nullable',
            ],
            'btn_2' => [
                'string',
                'nullable',
            ],
            'btn_3' => [
                'string',
                'nullable',
            ],
            'btn_1_link' => [
                'string',
                'nullable',
            ],
            'btn_2_link' => [
                'string',
                'nullable',
            ],
            'btn_3_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
