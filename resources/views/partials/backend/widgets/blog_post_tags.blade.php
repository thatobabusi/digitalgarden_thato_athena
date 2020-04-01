<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            Blog Post Tags
        </div>

        <div class="card-body">
            <ul class="list-group dashboard-list-scrollable">
                @foreach($tags as $tag)
                <li class="list-group-item">
                    {{$tag}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
