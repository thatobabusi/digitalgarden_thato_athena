<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepository;
use Illuminate\Http\Request;

/**
 * Class ImageTypeController
 *
 * @package App\Http\Controllers\Admin\Image
 */
class ImageTypeController extends Controller
{
    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * ImageTypeController constructor.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
    /**
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * @param Request $request
     * @param string  $id
     * @return void
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        //
    }
}
