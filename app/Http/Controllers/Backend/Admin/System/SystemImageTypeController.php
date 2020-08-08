<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Repositories\System\SystemImageRepository;
use Illuminate\Http\Request;

/**
 * Class SystemImageTypeController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemImageTypeController extends Controller
{
    /**
     * @var SystemImageRepository
     */
    protected $systemImageRepository;

    /**
     * ImageTypeController constructor.
     *
     * @param SystemImageRepository $systemImageRepository
     */
    public function __construct(SystemImageRepository $systemImageRepository)
    {
        $this->systemImageRepository = $systemImageRepository;
    }

    /**
     * @return void
     */
    public function index(): void
    {
        //
    }

    /**
     * @return void
     */
    public function create(): void
    {
        //
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * @param Request $request
     * @param string  $id
     * @return void
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        //
    }
}
