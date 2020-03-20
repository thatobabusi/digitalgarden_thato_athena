<?php

namespace App\Http\Requests;

use App\Models\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateBlogPostRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [


            'user_id'                   => ['required'], //user is going to be author of the blog post
            'title'                     => ['required'],
            'slug '                     => [''], //TODO::check why these dont return valid when actually filled in
            'summary '                  => [''], //TODO::check why these dont return valid when actually filled in
            'body  '                    => [''], //TODO::check why these dont return valid when actually filled in
            //'blog_post_category_id '    => [ 'required'], //TODO::check why these dont return valid when actually filled in
            //'id'    => ['required'], //TODO::check why these dont return valid when actually filled in
        ];

    }
}
