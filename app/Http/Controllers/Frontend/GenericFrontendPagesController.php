<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GenericFrontendPagesController
 *
 * @package App\Http\Controllers\Frontend
 */
class GenericFrontendPagesController extends Controller
{
    #TODO::For these to work 100% the routes must exist, otherwise 404
    const ACCEPTED_STATIC_PAGE_ROUTES = [
        '/',
        'home',
        'about',
        'blog',
        'test',
    ];

    /**
     * @param string|null $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function index(string $page = null)
    {

        #Redirects user that came from the migration-ui tool to the admin home page when they click go back to application
        #Contacted Dave Miller says its not a priority for him to change the functionality
        #Advised me to maybe do a pull request in future and fork his package to allow the kind of customization I want
        #Fair enough
        #
        #Another alternative is every time after composer install/update or fresh project install
        #add this $this->loadViewsFrom(base_path('resources/views/vendor/migration-ui'), 'migrations-ui');
        #to replace this $this->loadViewsFrom(__DIR__ . '/../resources/views', 'migrations-ui');
        #In his MigrationsUIServiceProvider.php file
        if( Str::contains(URL::previous(), 'admin/developer-tools/migrations') === true ) {
            return redirect()->action('Admin\HomeController@index');
        }

        $accepted_routes = self::ACCEPTED_STATIC_PAGE_ROUTES;

        if( in_array($page, $accepted_routes, true) || !$page ) {
            if(!$page) {
                #This should hit the page set as default. In my case thats the blog index page
                return redirect()->action('Frontend\BlogController@index');
            }

            #for others it could go to static pages (if they exist)
            activity('front-end')
                ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
                ->log('User entered a valid url and was redirected to the ' . $page . ' page.');

            #so long as they are named correctly (lower case) and are in this folder it should work fine
            return view("frontend.generic_static_content_pages.$page");

        }

        //If its an invalid route name error 404. Not joy
        return abort(Response::HTTP_NOT_FOUND);

    }

}
