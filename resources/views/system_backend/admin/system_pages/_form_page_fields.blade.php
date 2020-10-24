<?php
$fields = collect();
//dd($fields);
?>
<div class="div row">
    <div class="col-md-12">
        <div id="checklist" class="form-group multiple-form-group" data-max=10>
            @if(count($fields) > 0)
                @foreach($fields as $index => $field)
                    <div class="form-group next_comment">
                        <div class="col-md-8">
                            {{ Form::text('fields['.$index.']', $field->title, ['id' => 'new_comment','class' => 'form-control'])}}
                        </div>

                        <div class="col-md-2">
                            @if($index + 1 == count($fields))
                                {{ Form::button('+',['class' => 'btn btn-success btn-block btn-addComment' . ($index == 9 ? ' disabled' : '')]) }}
                            @else

                                {{ Form::button('-',['class' => 'btn btn-danger btn-block btn-removeComment']) }}
                            @endif
                        </div>
                    </div>
                @endforeach
            @else

                <div class="input-group mb-3 next_input_group_to_duplicate">

                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Title</span>
                            </div>
                            {{ Form::text('fields[1]', null, ['id' => 'new_comment','class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Type</span>
                            </div>
                            <select class="form-control" id="sel1">
                                <option value="checkbox">Checkbox</option>
                                <option value="email">Email</option>
                                <option value="file">File Upload</option>
                                <option value="select">Multiple Select</option>
                                <option value="password">Password</option>
                                <option value="radio">Radio Buttons</option>
                                <option value="select">Select</option>
                                <option value="text">Text</option>
                                <option value="textarea">Text Area</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Required</span>
                            </div>
                            <select class="form-control" id="sel1">
                                <option>No</option>
                                <option>Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Default</span>
                            </div>
                            {{ Form::text('fields[1]', null, ['id' => 'new_comment','class' => 'form-control', 'placeholder' => 'Default Value'])}}
                        </div>
                    </div>

                    <div class="col-md-1">
                        {{ Form::button('+',['class' => 'btn btn-success btn-block btn-addComment' /*. ($index == 9 ? ' disabled' : '')*/]) }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
