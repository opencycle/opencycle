<?php

namespace Opencycle\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Opencycle\Group;
use Opencycle\Post;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $group = Group::find($this->group);

        return $this->user()->can('create', [Post::class, $group]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required',
            'group' => 'required|exists:groups,id'
        ];
    }
}
