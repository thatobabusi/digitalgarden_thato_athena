@extends('system_layouts.frontend.app_frontend_layout_no_sidebar')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.contact', 'contact') }}
@endsection

@section('content')

    <?php
    require base_path('vendor/autoload.php');

    $session = new SpotifyWebAPI\Session(
        config('app.spotify_client_id'),
        config('app.spotify_client_secret'),
        config('app.spotify_redirect_uri')
    );

    $api = new SpotifyWebAPI\SpotifyWebAPI();

    if (isset($_GET['code'])) {
        $session->requestAccessToken($_GET['code']);
        $api->setAccessToken($session->getAccessToken());

        print_r($api->me());
        print_r($api->getMyPlaylists());
    } else {
        $options = [
            'scope' => [
                'user-read-email',
            ],
        ];

        header('Location: ' . $session->getAuthorizeUrl($options));
        die();
    }

    ?>

@endsection
