<?php

namespace Opencycle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateInstallEnvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !file_exists(app_path('installed'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_name' => 'required|string|max:50',
            'environment' => 'required|string|max:50',
            'app_debug' => [
                'required',
                Rule::in(['true', 'false']),
            ],
            'app_url' => 'required|url',
            'db_connection' => 'required|string|max:50',
            'db_host' => 'required|string|max:50',
            'db_port' => 'required|numeric',
            'db_database' => 'required|string|max:50',
            'db_username' => 'required|string|max:50',
            'db_password' => 'required|string|max:50',
            'mail_driver' => 'required|string|max:50',
            'mail_host' => 'required|string|max:50',
            'mail_port' => 'required|string|max:50',
            'mail_username' => 'required|string|max:50',
            'mail_password' => 'required|string|max:50',
            'mail_encryption' => 'required|string|max:50',
            'nopcatcha_secret' => 'required|string|max:50',
            'nopcatcha_sitekey' => 'required|string|max:50',
        ];
    }
}
