<?php

namespace Opencycle\Console\Commands;

use Dotenv\Dotenv;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Opencycle\Role;
use Opencycle\User;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opencycle:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs a fresh copy of Opencycle';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $envFilePath = app()->environmentFilePath();

        // Check if there is an existing env file.
        if (!File::exists($envFilePath) || $this->confirm('An existing .env file has been detected. Are you sure you wish to install Opencycle? This will remove the previous installation details.')) {
            $this->info('First we will create a new .env file and generate an application key');

            File::copy($envFilePath . '.example', $envFilePath);
            $this->call('key:generate', [
                '--force' => true,
            ]);

            $this->info('Now we need to set up your database');

            $this->installDatabase();

            $this->info('Finally we will create you an admin user');

            $username = $this->ask('What is your username?');
            $email = $this->ask('What is your email?');
            $password = $this->secret('What is your password?');

            $user = User::create([
                'username' => $username,
                'email' => $email,
                'password' => bcrypt($password),
            ]);

            $user->role()->associate(Role::where('name', 'admin')->first());

            $this->info('Ok, all done. You can now log into your site with those details');
        }
    }

    private function checkPhpVersion()
    {
        if (false) {
            $this->error('Your version of PHP is not supported, Opencycle requires at least PHP 7.1.3');
        }
    }

    private function checkRequirements()
    {
        if (false) {
            $this->error('Some PHP extensions are missing');
        }
    }

    private function checkPermissions()
    {
        if (false) {
            $this->error('Some folder permissions are not set');
        }
    }

    /**
     * Gather installation details about the database.
     *
     * @return bool
     */
    private function installDatabase()
    {
        $this->realoadEnv();

        $host = $this->ask('What is your database host?', '127.0.0.1');
        $this->writeEnvVar('DB_HOST', $host);

        $host = $this->ask('What is your database port?', '3306');
        $this->writeEnvVar('DB_PORT', $host);

        $database = $this->ask('What is your database name', 'opencycle');
        $this->writeEnvVar('DB_DATABASE', $database);

        $username = $this->ask('What is your database username?', 'homestead');
        $this->writeEnvVar('DB_USERNAME', $username);

        $password = $this->secret('What is your database password?');
        $this->writeEnvVar('DB_PASSWORD', $password);

        $this->realoadEnv();

        try {
            $this->call('migrate:refresh', [
                '--force' => true,
                '--seed' => true,
            ]);
        } catch (\Exception $e) {
            $this->error('Sorry, we could not connect with those details. Please try again');
            $this->error($e->getMessage());

            return $this->installDatabase();
        }

        return true;
    }

    /**
     * Reload env from file.
     */
    private function realoadEnv()
    {
        $this->callSilent('config:clear');
        with(new Dotenv(app()->environmentPath(), app()->environmentFile()))->overload();
        with(new LoadConfiguration())->bootstrap(app());
        DB::purge();
    }

    /**
     * Write a key/value out to the .env file.
     *
     * @param $key
     * @param $value
     */
    private function writeEnvVar($key, $value)
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
