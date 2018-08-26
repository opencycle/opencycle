<?php

namespace OpenCycle\Http\Requests\Adverts;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAdvertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $advert = $this->route('advert');

        return $advert && $this->user()->can('delete', $advert);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
