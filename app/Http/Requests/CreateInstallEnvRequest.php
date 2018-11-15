<?php

namespace Opencycle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstallEnvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // TODO
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_name'              => 'required|string|max:50',
            'environment'           => 'required|string|max:50',
            'app_debug'             => [
                'required',
                Rule::in(['true', 'false']),
            ],
            'app_url'               => 'required|url',
            'database_connection'   => 'required|string|max:50',
            'database_hostname'     => 'required|string|max:50',
            'database_port'         => 'required|numeric',
            'database_name'         => 'required|string|max:50',
            'database_username'     => 'required|string|max:50',
            'database_password'     => 'required|string|max:50',
            'mail_driver'           => 'required|string|max:50',
            'mail_host'             => 'required|string|max:50',
            'mail_port'             => 'required|string|max:50',
            'mail_username'         => 'required|string|max:50',
            'mail_password'         => 'required|string|max:50',
            'mail_encryption'       => 'required|string|max:50',
        ];
    }
}
