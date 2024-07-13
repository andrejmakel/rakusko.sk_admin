<?php

namespace App\Http\Requests;

use App\Models\Sidebar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySidebarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sidebar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sidebars,id',
        ];
    }
}