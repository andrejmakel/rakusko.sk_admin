<?php

namespace App\Http\Requests;

use App\Models\TransPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trans_post_edit');
    }

    public function rules()
    {
        return [
            'lang_id' => [
                'required',
                'integer',
            ],
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
            'slug' => [
                'string',
                'nullable',
            ],
            'origin_id' => [
                'required',
                'integer', 
            ],
        ];
    }
}
