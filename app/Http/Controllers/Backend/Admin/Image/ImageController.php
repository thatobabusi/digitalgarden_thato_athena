<?php

namespace App\Http\Controllers\Backend\Admin\Image;

use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers\Backend\Admin\Image
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
     * @param UploadedFile $request
     * @param string                        $image_type
     *
     * @return RedirectResponse
     */
    public function imageUploadPost(UploadedFile $request, string $image_type): RedirectResponse
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload_image = $this->imageRepository->uploadImage($request, $image_type);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$upload_image->title);

    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $images = $this->imageRepository->getAllImageRecords();

        $data = ['images' => $images];

        return view('admin.image.index', $data);
    }

    /**
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * @param string $slug
     *
     * @return Factory|View
     */
    public function show(string $slug)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $image = $this->imageRepository->getImageRecordBySlug($slug);
        $image->load('imageType');

        $data = ['image' => $image];

        return view('admin.image.show', $data);
    }

    /**
     * @param string $slug
     *
     * @return RedirectResponse
     */
    public function edit(string $slug): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * @param string $id
     *
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function massDestroy(Request $request): RedirectResponse
    {
        alert()->success('404: ', 'Redirected back: To edit the image you must do so
        from within the Blog Post or Entity it is related to')->timerProgressBar();

        return redirect()->back();

        /*$this->imageRepository->massDestroyImageRecords();

        alert()->success('Success','Images Deleted Successfully')->timerProgressBar();

        return response(null, Response::HTTP_NO_CONTENT);*/
    }
}