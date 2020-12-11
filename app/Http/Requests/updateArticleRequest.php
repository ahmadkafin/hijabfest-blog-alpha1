<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateArticleRequest extends FormRequest
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
            'article_title'     => 'required|max:150',
            'article_slug'      => 'required|',
            'article_content'   => 'required',
            'article_url_video' => 'nullable|url',
            'category_name'     => 'nullable'
        ];
    }
}
