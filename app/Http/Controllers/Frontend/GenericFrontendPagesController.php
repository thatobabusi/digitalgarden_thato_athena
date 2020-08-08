<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\System\SystemPage;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\System\SystemEmailRepository;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Meta;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GenericFrontendPagesController
 *
 * @package App\Http\Controllers\Frontend
 */
class GenericFrontendPagesController extends Controller
{
    /**
     * @var BlogPostCategoryRepository
     */
    protected $blogPostCategory;
    /**
     * @var SystemEmailRepository
     */
    protected $systemEmailPostCategory;
    /**
     * @var SystemMetaRepository
     */
    protected $systemMetadataRepository;
    /**
     * @var SystemPageRepository
     */
    protected $systemPageRepository;


    #TODO::For these to work 100% the routes must exist, otherwise 404
    const ACCEPTED_STATIC_PAGE_ROUTES = [
        '/',
        'test',
        'sitemap',
    ];

    /**
     * GenericFrontendPagesController constructor.
     *
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param SystemEmailRepository      $systemEmailPostCategory
     * @param SystemMetaRepository       $systemMetadataRepository
     * @param SystemPageRepository       $systemPageRepository
     */
    public function __construct(BlogPostCategoryRepository $blogPostCategory, SystemEmailRepository $systemEmailPostCategory,
        SystemMetaRepository $systemMetadataRepository, SystemPageRepository $systemPageRepository)
    {
        $this->blogPostCategory = $blogPostCategory;
        $this->systemEmailPostCategory = $systemEmailPostCategory;
        $this->systemMetadataRepository = $systemMetadataRepository;
        $this->systemPageRepository = $systemPageRepository;
    }

    /**
     * @param string|null $page
     *
     * @return Application|Factory|RedirectResponse|View|void
     */
    public function index(string $page = null)
    {

        if( Str::contains(URL::previous(), 'admin/developer-tools/migrations') === true )
        {
            return redirect()->action('Admin\HomeController@index');
        }

        $accepted_routes = self::ACCEPTED_STATIC_PAGE_ROUTES;
        $accepted_cms_page_routes = $this->systemPageRepository->listAllSystemPagesBySlug();

        #Blog Pages
        if( !$page )
        {
            return redirect()->action('Frontend\BlogController@index');
        }

        #CMS Pages
        if(in_array($page, $accepted_cms_page_routes, true))
        {
            return $this->displayCMSFrontendPageBySlug($page);
        }

        #Static Pages
        if(in_array($page, $accepted_routes, true) )
        {
            #for others it could go to static pages (if they exist)
            activity('front-end')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
                ->log('User entered a valid url and was redirected to the ' . $page . ' page.');

            $this->systemMetadataRepository->formatMetaData('index,follow', $page);

            #so long as they are named correctly (lower case) and are in this folder it should work fine
            return view("frontend.pages.$page");

        }

        //If its an invalid route name error 404. No joy
        return abort(Response::HTTP_NOT_FOUND);

    }

    /**
     * @param $page_slug
     *
     * @return Application|Factory|View
     */
    public function displayCMSFrontendPageBySlug($page_slug)
    {
        #If its a get, display the contact page
        $blogPostCategories = $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15');
        $page = $this->systemPageRepository->getSystemPageBySlug($page_slug);

        $page_title = Str::words($page->title);
        $page_header = Str::upper($page->title);

        $this->systemMetadataRepository->formatMetaData(
            $page->systemPageMetadata->robots,
            $page->systemPageMetadata->title,
            $page->systemPageMetadata->author,
            $page->systemPageMetadata->keywords,
            $page->systemPageMetadata->description
        );

        $data = compact('blogPostCategories', 'page', 'page_title', 'page_header');

        return view("frontend.pages._dynamic_cms_frontend_page", $data);
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function contact(Request $request)
    {
        #If it's a post, send the email and redirect
        if($request->method() === "POST")
        {
            $this->systemEmailPostCategory->processContactFormEmail($request);
        }

        #If its a get, display the contact page
        $blogPostCategories = $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15');
        $page_title = "Contact";
        $page_header = "CONTACT";

        $data = compact('blogPostCategories', 'page_title', 'page_header');

        $this->systemMetadataRepository->formatMetaData('index,follow', $page_title);

        return view("frontend.pages.contact", $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function sitemap()
    {

        #If its a get, display the contact page
        $blogPostCategories = $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15');
        $page_title = "Site Map";
        $page_header = "SITE MAP";

        $data = compact('blogPostCategories', 'page_title', 'page_header');

        $this->systemMetadataRepository->formatMetaData('index,follow', $page_title);

        return view("frontend.sitemap", $data);
    }

}
