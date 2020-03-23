<footer class="visible-md visible-lg footer-newsletter">
    <div class="container">

        @include('partials.frontend.footer_advertisements')

        @include('partials.frontend.newsletter_subscribe')

        <div class="footer-bottom">
            <div class="left">
                @if(config('navigationmenu.footer_navigation'))
                <nav class="clearfix">
                    <ul class="list-inline">
                        @foreach(config('navigationmenu.footer_navigation') as $key => $value)
                        <li><a href="{{$value['url_link']}}">{{$value['title']}}</a></li>
                        @endforeach
                    </ul>
                </nav>
                @endif

                <p class="copyright-text">&copy;{{config('app.created_first_date')}} - {{date("Y")}}
                    <a href="{{config('app.app_url')}}" target="_blank">
                        {{config('app.created_by_copyrights')}}
                    </a>.
                  All Rights Reserved.
                </p>

            </div>

            @if(config('social.social_media'))
            <ul class="right list-inline social-icons social-icons-bordered social-icons-small social-icons-fullrounded">
                @foreach(config('social.social_media') as $key => $value)
                    <li>
                        <a href="{{$value['link']}}">
                            <i class="{{$value['icon']}}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>
</footer>
