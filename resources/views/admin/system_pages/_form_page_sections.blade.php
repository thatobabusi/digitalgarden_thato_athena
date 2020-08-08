<div class="card">

    <div class="card-header">
        Page Sections
    </div>
    <div class="card-body">

        <div class="div row">
            <div class="col-md-12">
                <div id="checklist" class="form-group multiple-form-group" data-max=10>

                    <div class="input-group mb-3">

                        <div class="col-md-6">
                            <label>Title</label>
                            {{ Form::hidden('section_id', null,
                            ['id' => 'section_id','class' => 'form-control', 'placeholder' => 'section_id'])}}

                            {{ Form::text('page_section_title', null,
                            ['id' => 'page_section_title','class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>

                        <div class="col-md-6">
                            <label>Header</label>
                            {{ Form::text('page_section_header', null,
                            ['id' => 'page_section_header','class' => 'form-control', 'placeholder' => 'Header'])}}
                        </div>

                        <div class="col-md-6">
                            <label>Sub header</label>
                            {{ Form::text('page_section_subheader', null,
                            ['id' => 'page_section_subheader','class' => 'form-control', 'placeholder' => 'Sub-header'])}}
                        </div>

                        <div class="col-md-6">
                            <label>Order</label>
                            <select class="form-control" id="page_section_order" name="page_section_order">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">

                            <label class="required" for="page_section_body">{{ trans('cruds.blogPost.fields.body') }}</label>

                            {{Form::textarea('page_section_body', null,['class' => 'form-control','id' => 'page_section_body'])}}

                            @if($errors->has('page_section_body'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('page_section_body') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blogPost.fields.body_helper') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
