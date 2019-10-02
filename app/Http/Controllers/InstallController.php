<?php

namespace Opencycle\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
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
     * @return \Illuminate\View\View
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
        return view('install.environment');
    }

    /**
     * Store environment.
     *
     * @param CreateInstallEnvRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function environmentStore(CreateInstallEnvRequest $request)
    {
        collect($request->all())->each(function ($item, $key) {
            $this->installationService->writeEnvVar(strtoupper($key), $item);
        });

        return redirect()->route('install.database');
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function database()
    {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);

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
