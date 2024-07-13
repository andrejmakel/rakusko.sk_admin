<?php

namespace App\Http\Requests;

use App\Models\Ad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ad_edit');
    }

    public function rules()
    {
        return [
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'malls.*' => [
                'integer',
            ],
            'malls' => [
                'array',
            ],
            'places.*' => [
                'integer',
            ],
            'places' => [
                'array',
            ],
            'posts.*' => [
                'integer',
            ],
            'posts' => [
                'array',
            ],
            'infos.*' => [
                'integer',
            ],
            'infos' => [
                'array',
            ],
        ];
    }
}