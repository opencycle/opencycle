<?php

namespace Opencycle\Providers;

use Dotenv\Dotenv;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class InstallationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $key = config('app.key');
        $envFile = app()->environmentFilePath();

        if (Request::path() === 'install' && !file_exists(app_path('installed')) && empty($key) && !file_exists($envFile)) {
            copy(base_path('.env.example'), $envFile);

            $this->writeAppKey($envFile, $this->generateRandomKey());
            $this->reloadConfig();
        }
    }

    /**
     * Generate a random key for the application.
     *
     * @return string
     */
    protected function generateRandomKey()
    {
        return 'base64:'.base64_encode(
            Encrypter::generateKey(config('app.cipher'))
        );
    }

    /**
     * Write a new APP_KEY to the .env file.
     *
     * @param string $envFile
     * @param string $key
     */
    protected function writeAppKey(string $envFile, string $key)
    {
        file_put_contents($envFile, str_replace("APP_KEY=", "APP_KEY=".$key, file_get_contents($envFile)));
    }

    /**
     * Reload Laravel config from .env file.
     */
    protected function reloadConfig()
    {
        with(new Dotenv(app()->environmentPath()))->overload();
        with(new LoadConfiguration())->bootstrap(app());
    }
}
