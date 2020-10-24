<?php $lastfmData = []; //get_last_fm_data(); ?>
<?php //$current_playing_track = $lastfmData['current_playing_track']; ?>
<?php //$recent_tracks = $lastfmData['recent_tracks']; ?>

@if(!empty($lastfmData))
<div class="sidebar-widget" style="height: 300px !important; overflow: scroll; overflow-x: hidden;">
    <h6 class="widget-title">NOW PLAYING</h6>

    <p class="category-widget">

        @foreach($recent_tracks as $track)
            <div class="recent-posts">
                <div class="recent-post-image">
                    <img src="{{$track['image'][1]['#text']}}" alt="" height="20" class="responsive">
                </div>
                <!-- / recent-post-image -->
                <div class="recent-post-content">
                    <a href="{{ $track['url'] }}" target="_blank">

                        @if($current_playing_track)
                            @if($current_playing_track['artist']['#text'] == $track['artist']['#text'] && $track['name'] == $current_playing_track['name'])
                                <i class="fa fa-music" aria-hidden="true"></i>
                            @endif
                            {{$track['artist']['#text'] . ' - ' . $track['name']}}
                            @if($current_playing_track['artist']['#text'] == $track['artist']['#text'] && $track['name'] == $current_playing_track['name'])
                                <i class="fa fa-music" aria-hidden="true"></i>
                            @endif
                        @else
                            {{$track['artist']['#text'] . ' - ' . $track['name']}}
                        @endif
                    </a>
                </div>
                <!-- / recent-post-content -->
            </div>
        @endforeach
    </p>
</div>
<!-- / sidebar-widget -->
@endif

<div class="sidebar-widget">
    <h6 class="widget-title">RECOMMENDED READS</h6>
    @php($blogPostsCount = 0)
    @foreach($blogPostsRecommended as $blogPost)
        <p class="category-widget">
            <div class="recent-posts first">
                @if(isset($blogPost->blogPostImage()->src))
                    <div class="recent-post-image">
                        <img src="{{ isset($blogPost->blogPostImage()->src) ? URL::asset(''.$blogPost->blogPostImage()->src.'') : '#' }}" alt="">
                    </div>
                @endif

                <!-- / recent-post-image -->
                <div class="recent-post-content">
                    <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                        {{Str::words($blogPost->title, 8, '...')}}
                    </a>
                    <p>{{ \Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</p>
                </div>
                <!-- / recent-post-content -->
            </div>
        </p>
    @endforeach
    <!-- / recent-posts -->
    <!-- / recent-posts-widget -->
</div>
<!-- / sidebar-widget -->

