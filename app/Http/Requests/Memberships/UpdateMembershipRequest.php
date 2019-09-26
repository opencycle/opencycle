<?php

namespace Opencycle\Http\Requests\Memberships;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMembershipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $group = $this->route('group');
        $membership = $this->user()->getMembership($group);

        return $group && $this->user() && $this->user()->can('update', $membership);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email_prefs' => 'required|integer|max:3',
        ];
    }
}
