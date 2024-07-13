<?php

namespace App\Http\Requests;

use App\Models\Sidebar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSidebarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sidebar_edit');
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
        ];
    }
}