@extends('system_layouts.frontend.app_frontend_layout_no_sidebar')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.music', 'music') }}
@endsection

@section('content')

    <section id="contact">

        <div class="container">

            <div class="row vcenter">
                <div class="col-md-12">
                    <h5 class="mt-3">#turnOffTheRadio!!!</h5>
                    <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                    <div>
                        I cut off terrestrial radio in 2006 when I realized that we are not really listening to the best
                        of what is available out there but rather the DJ's favorites or whoever pays the programming manager
                        the highest payola. <br/><br/>

                        How can it be that it is a hit song because it is on repeat every hour? Not a tin-foil moment but I
                         realized they are dicating what is hot and what is not with limited selections.<br/><br/>

                        If politics has taught us anything it's that "millions of people can all be wrong at once."
                        To each his own. Not me. I would rather scour the entire internet and find rare gems.<br/><br/>

                        This is what I am listening to...<br/><br/>

                        <b>#dontBeAStereoType #expandYourMusicalTaste</b><br/><br/>
                    </div>
                </div>
            </div>

            @if (empty($lastfmData))
                <div class="col-md-12">
                    <h5 class="mt-3">Oh oh....</h5>
                    <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                    <div style="height: 300px !important;">
                        API Call Limits reached for now. Come back later.
                    </div>
                </div>
            @else

                <?php $current_playing_track = $lastfmData['current_playing_track']; ?>

                <?php $recent_tracks = $lastfmData['recent_tracks']; ?>

                <?php $top_albums_this_week = $lastfmData['top_albums_this_week']; ?>

                <?php $top_artists = $lastfmData['top_artists']; ?>

                <?php $top_artists_this_week = $lastfmData['top_artists_this_week']; ?>

                <!-- / sidebar-widget -->
                <div class="row vcenter">

                    <div class="col-md-6">
                        <h5 class="mt-3">RECENTLY PLAYED</h5>
                        <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                        <div style="height: 300px !important; overflow: scroll; overflow-x: hidden;">
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
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mt-3">TOP ARTISTS</h5>
                        <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                        <div style="height: 300px !important; overflow: scroll; overflow-x: hidden;">
                            @foreach($top_artists as $artist)
                                <div class="recent-posts">
                                    <div class="recent-post-image">
                                        <img src="{{$artist['image'][1]['#text']}}" alt="" height="20" class="responsive">
                                    </div>
                                    <!-- / recent-post-image -->
                                    <div class="recent-post-content">
                                        <a href="{{ $artist['url'] }}" target="_blank">
                                            {{$artist['name']}}
                                            {!! '<b>('.$artist['playcount'] .' play/s)</b>' !!}
                                        </a>
                                    </div>
                                    <!-- / recent-post-content -->
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mt-3">TOP ARTISTS THIS WEEK</h5>
                        <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                        <div style="height: 300px !important; overflow: scroll; overflow-x: hidden;">
                            @foreach($top_artists_this_week as $artist)
                                <div class="recent-posts">
                                    <div class="recent-post-image">
                                        <img src="{{$artist['image'][1]['#text']}}" alt="" height="20" class="responsive">
                                    </div>
                                    <!-- / recent-post-image -->
                                    <div class="recent-post-content">
                                        <a href="{{ $artist['url'] }}" target="_blank">
                                            {{$artist['name']}}
                                            {!! '<b>('.$artist['playcount'] .' play/s)</b>' !!}
                                        </a>
                                    </div>
                                    <!-- / recent-post-content -->
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mt-3">TOP ALBUMS THIS WEEK</h5>
                        <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                        <div style="height: 300px !important; overflow: scroll; overflow-x: hidden;">
                            @foreach($top_albums_this_week as $album)
                                @if($album['image'][1]['#text'])
                                    <div class="recent-posts">
                                        <div class="recent-post-image">
                                            <img src="{{$album['image'][1]['#text']}}" alt="" height="20" class="responsive">
                                        </div>
                                        <!-- / recent-post-image -->
                                        <div class="recent-post-content">
                                            <a href="{{ $album['url'] }}" target="_blank">
                                                {{$album['artist']['name'] . ' - ' . $album['name']}}
                                                {!! '<b>('.$album['playcount'] .' play/s)</b>' !!}
                                            </a>
                                        </div>
                                        <!-- / recent-post-content -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- / column -->

                </div>
                <!-- / row -->
            @endif

        </div>
        <!-- / container -->

    </section>
    <!-- / contact -->

@endsection
