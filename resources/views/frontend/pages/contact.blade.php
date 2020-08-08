@extends('layouts.frontend.app_frontend_layout_no_sidebar')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.contact', 'contact') }}
@endsection

@section('content')

    <style>
        .with-errors {
            color: red !important;
        }
    </style>
    <section id="contact">
        <div class="container">
            <div class="row vcenter">
                <div class="col-md-7">
                    <div id="map">
                    </div><!-- / map -->
                </div><!-- / column -->
                <div class="col-md-5">

                    <h5 class="mt-3">CONTACT INFO</h5>
                    <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                    <p class="lead">
                        *Be advised that the form will not submit at all if you do not enter
                        a valid response to the reCaptcha image above the submit button.
                    </p>

                    {{ Form::open(['route' => ['frontend.contact.submit'], 'method' => 'POST', 'id' => 'contactForm',
                        'name' => 'contactForm', 'data-toggle' => 'validator'] ) }}

                        <div class="row">

                            <div class="col-md-6 sub-col-left form-group{{ $errors->has('firstname') ? ' has-error with-errors' : '' }}">
                                {{ Form::text('firstname', old('firstname'), ['class' => 'form-control', 'name' => 'firstname',
                                    'placeholder' => '*First Name', 'required' => 'required']) }}
                                {!! $errors->first('firstname', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                            <!-- / sub-column -->

                            <div class="col-md-6 sub-col-right form-group{{ $errors->has('surname') ? ' has-error with-errors' : '' }}">
                                {{ Form::text('surname', old('surname'), ['class' => 'form-control', 'name' => 'surname',
                                    'placeholder' => '*Surname', 'required' => 'required']) }}
                                {!! $errors->first('surname', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                            <!-- / sub-column -->

                            <div class="col-md-6 sub-col-left form-group{{ $errors->has('email') ? ' has-error with-errors' : '' }}">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'name' => 'email',
                                    'placeholder' => '*Email', 'required' => 'required']) }}
                                {!! $errors->first('email', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                            <!-- / sub-column -->

                            <div class="col-md-6 sub-col-right form-group{{ $errors->has('cellphone') ? ' has-error with-errors' : '' }}">
                                {{ Form::text('cellphone', old('cellphone'), ['class' => 'form-control', 'name' => 'cellphone',
                                    'placeholder' => '*Cellphone', 'required' => 'required']) }}
                                {!! $errors->first('cellphone', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                            <!-- / sub-column -->

                            <div class="col-md-12 sub-col-left form-group{{ $errors->has('subject') ? ' has-error with-errors' : '' }}">
                                {{ Form::text('subject', old('subject'), ['class' => 'form-control', 'name' => 'subject',
                                    'placeholder' => '*Subject', 'required' => 'required']) }}
                                {!! $errors->first('subject', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                            <!-- / sub-column -->

                            <div class="col-md-12{{ $errors->has('message') ? ' has-error with-errors' : '' }}">
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="*Message" required>{{old('message')}}</textarea>
                                    {!! $errors->first('message', '<span class="help-block with-errors">:message</span>') !!}
                                </div>
                            </div>
                            <!-- / sub-column -->

                        </div>
                        <!-- / row -->

                        <div class="row">
                            <div class="col-md-6 sub-col-left form-group">
                                @captcha
                            </div>

                            <div class="col-md-6 sub-col-right form-group{{ $errors->has('captcha') ? ' has-error with-errors' : '' }}">
                                <input type="text" class="form-control" id="captcha" name="captcha" autocomplete="off">
                                {!! $errors->first('captcha', '<span class="help-block with-errors">:message</span>') !!}
                            </div>
                        </div>


                        <button type="submit" id="form-submit" class="btn btn-primary col-md-12">
                            <i class="md-icon dp14 mr-1">send</i>
                            <span>SEND MESSAGE</span>
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>

                    {{ Form::close() }}
                    <!-- / contactform -->

                </div>
                <!-- / column -->

            </div>
            <!-- / row -->

        </div>
        <!-- / container -->

    </section>
    <!-- / contact -->

    <div class="cta-big bg-primary dark">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-3 text-white">GET IN TOUCH</h3>
                <p class="lead mb-3">
                    Call or send and Email to request a quote for your next project!
                </p>
                <a href="tel:00123456789" class="btn btn-outline-white m-1 pill">
                    <i class="md-icon dp14 mr-2">phone</i><span>CALL</span>
                </a>
                <a href="mailto:info@mywebsite.com" class="btn btn-outline-white m-1 pill">
                    <i class="md-icon dp14 mr-2">email</i><span>EMAIL</span>
                </a>
            </div><!-- / row -->
        </div><!-- / container -->
    </div><!-- / cta -->

@endsection
