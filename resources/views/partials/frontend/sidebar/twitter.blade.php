<div class="widget">

    <h4 class="widget-title">TWITTER FEED</h4>

    <a class="twitter-timeline" href="{{ config('app.twitter_feed', 'https://twitter.com/Thato_Babusi?ref_src=twsrc%5Etfw') }}"
       target="_blank" data-height="500">
        follow {{config('social.social_media.Twitter.username')}} for more..
    </a>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <div class="section twitter-stream">
        <div id="tweets"></div>
    </div>
</div>
