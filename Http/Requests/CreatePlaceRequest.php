<?php

namespace Modules\Iplaces\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePlaceRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'title'=>'required:min2',
            'category_id'=>'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [
            'title.required' => trans('iplaces::messages.name is required'),
            'title.min2'=>trans('iplaces::messages.name is min '),
            'category_id.required'=>trans('iplaces::messages.category is required'),
        ];
    }
}
