<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Models\System\SystemConfigPlugin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SystemConfigPluginsController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemConfigPluginsController extends Controller
{

    public function index()
    {
        $system_config_plugins = SystemConfigPlugin::all();

        $data = compact('system_config_plugins');

        return view("admin.system_config_plugins.index", $data);
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
