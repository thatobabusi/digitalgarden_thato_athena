<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers\Admin\Image
 */
class ImageController extends Controller
{

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * ImageController constructor.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imageUploadPost(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $upload_image = $this->imageRepository->uploadImage($request);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$upload_image->title);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [];
        //$data = [$image = $this->imageRepository->displayImage()];

        return view('admin.image.index', $data);
    }

    /**
     * @return void
     */
    public function create()
    {
        //
    }

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

    /**
     * @param Request $request
     * @return void
     */
    public function uploadImages(Request $request) {
        //
    }
}
