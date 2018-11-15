<?php

namespace Opencycle\Services;

class InstallationService
{
    /**
     * Get the current version of PHP
     *
     * @return mixed
     */
    public function getCurrentPhpVersion()
    {
        preg_match("#^\d+(\.\d+)*#", PHP_VERSION, $filtered);

        return $filtered[0];
    }

    /**
     * Get the minimum supported version of PHP
     *
     * @return mixed
     */
    public function getSupportedPhpVersion()
    {
        $composer = json_decode(file_get_contents(base_path('composer.json')), true);

        return $composer['require']['php'];
    }

    /**
     * Write a key/value out to the .env file.
     *
     * @param $key
     * @param $value
     */
    public function writeEnvVar($key, $value)
    {
        $path = app()->environmentFilePath();

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace("$key=".$old, "$key=".$value, file_get_contents($path)));
        }
    }
}
