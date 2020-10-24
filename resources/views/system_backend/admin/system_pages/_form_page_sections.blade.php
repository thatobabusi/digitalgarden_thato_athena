<div class="div row">
    <div class="col-md-12">
        <div id="checklist" class="form-group multiple-form-group" data-max=10>

            <div class="input-group mb-3">

                <div class="col-md-6">
                    <label>Title</label>
                    {{ Form::hidden('page_id', $systemPage->id ?? null,
                    ['id' => 'page_id','class' => 'form-control', 'placeholder' => 'page_id'])}}

                    {{ Form::hidden('section_id', $systemPageSection->id ?? null,
                    ['id' => 'section_id','class' => 'form-control', 'placeholder' => 'section_id'])}}

                    {{ Form::text('page_section_title', $systemPageSection->title ?? null,
                    ['id' => 'page_section_title','class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>

                <div class="col-md-6">
                    <label>Header</label>
                    {{ Form::text('page_section_header', $systemPageSection->header ?? null,
                    ['id' => 'page_section_header','class' => 'form-control', 'placeholder' => 'Header'])}}
                </div>

                <div class="col-md-6">
                    <label>Sub header</label>
                    {{ Form::text('page_section_subheader', $systemPageSection->subheader ?? null,
                    ['id' => 'page_section_subheader','class' => 'form-control', 'placeholder' => 'Sub-header'])}}
                </div>

                <div class="col-md-6">
                    <label>Order</label>
                    <select class="form-control" id="page_section_order" name="page_section_order">

                        <?php $orders = get_all_frontend_system_page_sections(); ?>

                        @if(isset($systemPageSection->order))
                            @for($x = 1; $x <= count($orders); $x++)
                                <option value="{{ $x }}" {{ isset($systemPageSection->order) && $systemPageSection->order == $x ? 'selected' : '' }}>
                                    {{ $x }}
                                </option>
                            @endfor
                        @else

                            <?php $count_limit = count($orders) + 1; ?>

                            @for($x = 1; $x <= $count_limit; $x++)
                                <option value="{{$x}}">{{$x}}</option>
                            @endfor
                        @endif

                    </select>
                </div>

                <div class="form-group col-md-12">

                    <label class="required" for="page_section_body">{{ trans('cruds.blogPost.fields.body') }}</label>

                    {{Form::textarea('page_section_body', $systemPageSection->body ?? null,['class' => 'form-control','id' => 'page_section_body'])}}

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
