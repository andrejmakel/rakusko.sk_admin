@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.openingText.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opening-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.id') }}
                        </th>
                        <td>
                            {{ $openingText->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.sk') }}
                        </th>
                        <td>
                            {{ $openingText->sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.de') }}
                        </th>
                        <td>
                            {{ $openingText->de }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.cs') }}
                        </th>
                        <td>
                            {{ $openingText->cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.hu') }}
                        </th>
                        <td>
                            {{ $openingText->hu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openingText.fields.sl') }}
                        </th>
                        <td>
                            {{ $openingText->sl }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opening-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#open_text_openings" role="tab" data-toggle="tab">
                {{ trans('cruds.opening.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="open_text_openings">
            @includeIf('admin.openingTexts.relationships.openTextOpenings', ['openings' => $openingText->openTextOpenings])
        </div>
    </div>
</div>

@endsection