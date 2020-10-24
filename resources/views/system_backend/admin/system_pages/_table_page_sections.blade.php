<div class="card">

    <div class="card-header">
        Page Sections

        <a href="{{ route("admin.system-page-sections.create", [$system_page->id]) }}" class="btn btn-success pull-right">
            A New Section
        </a>

    </div>
    <div class="card-body">

        <div class="div row">
            <div class="col-md-12">
                <table class="table page-sections" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th class="all">Title</th>
                        <th class="all">Header</th>
                        <th class="all">Subheader</th>
                        <th class="all">Order</th>
                        <th class="all text-center"><i class="fa fa-cogs"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
