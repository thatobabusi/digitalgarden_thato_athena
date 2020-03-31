<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            Blog Post Categories
        </div>

        <div class="card-body">
            <ul class="list-group dashboard-list-scrollable">
                @foreach($categories as $category)
                <li class="list-group-item">
                    {{$category}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
