<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Resume\ResumeRepository;
use App\Repositories\System\SystemImageRepository;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Class ResumeController
 *
 * @package App\Http\Controllers\Frontend
 */
class ResumeController extends Controller
{
    /**
     * @var ResumeRepository
     */
    protected $resumeRepository;
    /**
     * @var SystemMetaRepository
     */
    protected $systemMetadataRepository;

    /**
     * ResumeController constructor.
     *
     * @param ResumeRepository     $resumeRepository
     * @param SystemMetaRepository $systemMetadataRepository
     */
    public function __construct( ResumeRepository $resumeRepository, SystemMetaRepository $systemMetadataRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->systemMetadataRepository = $systemMetadataRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function aboutMe()
    {
        $resume = $this->resumeRepository->getResumeContentForFrontEnd();
        $data = compact('resume');

        $keywords = "About Me, PHP, Laravel, Web Developer, Systems Developer";
        $title = Str::title("About Me");
        $summary = Str::title("About Me");

        $this->systemMetadataRepository->formatMetaData(
            "noindex,nofollow",
            "$title",
            "Thato Babusi",
            "About Thato Babusi, $keywords",
            "$summary",
            null
        );

        #Log it
        activity('front-end | view single blog post')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Resume Page.');

        return view('system_frontend.professional.index', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function resume()
    {
        $resume = $this->resumeRepository->getResumeContentForFrontEnd();
        $data = compact('resume');

        $keywords = "My Resume, My CV, PHP, Laravel, Web Developer, Systems Developer";
        $title = Str::title("My Resume");
        $summary = Str::title("My Resume");

        $this->systemMetadataRepository->formatMetaData(
            "noindex,nofollow",
            "$title",
            "Thato Babusi",
            "Thato Babusi Resume, $keywords",
            "$summary",
            null
        );

        #Log it
        activity('front-end | view single blog post')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Resume Page.');

        return view('system_frontend.professional.resume', $data);
    }
}
