<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Models\System\SystemConfigPlugin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class SystemConfigPluginsController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemConfigPluginsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $system_config_plugins = SystemConfigPlugin::all();

        $data = compact('system_config_plugins');

        return view("system_backend.admin.system_config_plugins.index", $data);
    }

    /**
     * @return Response|null
     */
    public function create(): ?Response
    {
        //
    }

    /**
     * @param Request $request
     *
     * @return Response|null
     */
    public function store(Request $request): ?Response
    {
        //
    }

    /**
     * @param string $id
     *
     * @return Response|null
     */
    public function show(string $id): ?Response
    {
        //
    }

    /**
     * @param string $id
     *
     * @return Response|null
     */
    public function edit(string $id): ?Response
    {
        //
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return Response|null
     */
    public function update(Request $request, string $id): ?Response
    {
        //
    }

    /**
     * @param string $id
     *
     * @return Response|null
     */
    public function destroy(string $id): ?Response
    {
        //
    }
}
