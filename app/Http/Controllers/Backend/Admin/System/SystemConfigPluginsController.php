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
    /**
     * @return Response|null
     */
    public function index(): ?Response
    {
        $systemConfigPlugins = SystemConfigPlugin::all();
        dd($systemConfigPlugins);
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
