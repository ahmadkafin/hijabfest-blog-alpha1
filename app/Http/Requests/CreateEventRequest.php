<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_name'        => 'required',
            'event_slug'        => 'required|unique:tbl_events',
            'event_desc'        => 'required|max:100',
            'event_is_active'   => 'nullable'
        ];
    }
}
