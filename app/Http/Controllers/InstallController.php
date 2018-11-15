<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Http\Requests\CreateInstallEnvRequest;
use Opencycle\Services\InstallationService;

class InstallController extends Controller
{
    /**
     * The installation service.
     *
     * @var InstallationService
     */
    private $installationService;

    /**
     * InstallController constructor.
     *
     * @param InstallationService $installationService
     */
    public function __construct(InstallationService $installationService)
    {
        $this->installationService = $installationService;
    }

    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        return view('install.start');
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $phpVersion = $this->installationService->getCurrentPhpVersion();
        $minVersion = $this->installationService->getSupportedPhpVersion();

        $phpSupported = version_compare($phpVersion, $minVersion) >= 0;

        $requirements = collect(array_flip(config('opencycle.requirements.modules')));

        $requirements->transform(function ($value, $module) {
            return extension_loaded($module);
        });

        $requirementsSupported = !$requirements->contains(false);

        return view('install.requirements', compact('requirements', 'requirementsSupported', 'phpSupported', 'phpVersion'));
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        $permissions = collect(array_flip(config('opencycle.requirements.writable')));

        $permissions->transform(function ($value, $folder) {
            return is_writable(base_path($folder));
        });

        $passed = !$permissions->contains(false);

        return view('install.permissions', compact('permissions', 'passed'));
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentCreate()
    {
        $envPath = app()->environmentFilePath();
        $envExamplePath = base_path('.env.example');

        if (!file_exists($envPath)) {
            if (file_exists($envExamplePath)) {
                copy($envExamplePath, $envPath);
            } else {
                touch($envPath);
            }
        }

        $envConfig = file_get_contents($envPath);

        return view('install.environment', compact('envConfig'));
    }

    /**
     * Store environment.
     *
     * @param CreateInstallEnvRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function environmentStore(CreateInstallEnvRequest $request)
    {
        $request->all();

        $this->installationService->writeEnvVar($key, $value);

        return redirect()->route('install.database');
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        return redirect()->route('install.finish');
    }

    /**
     * Update installed file and display finished view.
     *
     * @return \Illuminate\View\View
     */
    public function finish()
    {
        return view('install.finished');
    }
}
