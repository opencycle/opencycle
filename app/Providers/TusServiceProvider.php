<?php

namespace Opencycle\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use TusPhp\Tus\Server;

class TusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tus-server', function () {
            $server = new Server();

            if (strtolower($server->getRequest()->method()) === 'post') {
                $uploadDir = storage_path('app/public/uploads/' . $server->getUploadKey());

                if (!File::exists($uploadDir)) {
                    File::makeDirectory($uploadDir, 0755, true, true);
                }

                $server->setUploadDir($uploadDir);
            }

            $server->setApiPath('/tus')
                ->setMaxUploadSize(10000000);

            return $server;
        });
    }
}
