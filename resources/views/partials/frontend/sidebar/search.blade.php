{{--<div class="sidebar-widget">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button class="btn btn-primary rectangle" type="button"><i class="md-icon dp18">search</i></button>
        </span>
    </div>
    <!-- / input-group -->
</div>
<!-- / sidebar-widget -->--}}


<div class="sidebar-widget">
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search..."> <span class="input-group-btn">
                <button type="submit" class="btn btn-primary rectangle">
                    <i class="md-icon dp18">search</i>
                </button>
            </span>
        </div>
    </form>
</div>
