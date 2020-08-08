<?php

namespace App\Http\Controllers\Backend\Admin\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UploadsController
 *
 * @package App\Http\Controllers\Backend\Admin\Upload
 */
class UploadsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [];

        return view('admin.uploads.index', $data);
    }
}
