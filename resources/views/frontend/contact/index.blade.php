@extends('layouts.frontend')

@section('content')


    <section class="main-wrapper">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>

                    <div class="col-lg-11 col-md-12 col-xs-12 col-sm-12">
                        <div class="contact-div shadow-sm">
                        <div class="contact-side-img pl-5">
                            <ul style="margin-top: calc(100% - 45%);">
                                <li class="bold-text"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 1.5rem;"></i> Address</li>
                                <li style="padding-left: 3.3rem;">Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US</li>
                            </ul>

                            <ul style="margin-top: 2rem;">
                                <li class="bold-text"><i class="fa fa-phone" aria-hidden="true" style="padding-right: 1.5rem;"></i> Lets Talk</li>
                                <li style="padding-left: 3.4rem;color: #00AD4F;">+1 800 1236879</li>
                            </ul>

                            <ul style="margin-top: 2rem;">
                                <li class="bold-text"><i class="fa fa-envelope" aria-hidden="true" style="padding-right: 1.5rem;"></i> General Support</li>
                                <li style="padding-left: 3.5rem;color: #00AD4F;">contact@example.com</li>
                            </ul>

                        </div>
                        <div class="contact-form text-center">
                            <h3 style="margin-bottom: 40px;">Send Us A Message</h3>
                            {!! Form::open(['method'=>'post','url'=>'/message', 'id' => 'contact-form']) !!}
                                <div class="form-group row" style="padding-bottom: 25px">
                                    <label for="fname" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-form-label text-md-left">Tell us your name *</label>

                                    <div class="col-md-6">
                                        {!! Form::text('first_name',null,['class'=>'form-control','name' => 'first_name', 'placeholder' => 'First Name']) !!}
                                        {!! $errors->first('first_name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::text('last_name',null,['class'=>'form-control','name' => 'last_name', 'placeholder' => 'Last Name']) !!}
                                        {!! $errors->first('last_name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label text-md-left">enter your email *</label>

                                    <div class="col-md-12" style="padding-bottom: 25px">
                                        {!! Form::text('email',null,['class'=>'form-control','name' => 'email']) !!}
                                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-12 col-form-label text-md-left">phone number *</label>

                                    <div class="col-md-12" style="padding-bottom: 25px">
                                        {!! Form::text('phone',null,['class'=>'form-control','name' => 'phone', 'placeholder' => '98XXXXXXXX']) !!}
                                        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="message" class="col-md-12 col-form-label text-md-left">message *</label>

                                    <div class="col-md-12" style="padding-bottom: 25px">
                                        {!! Form::textarea('message',null,['class'=>'form-control','name' => 'message', 'rows' => '3']) !!}
                                        {!! $errors->first('message', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <button type="submit" id="contact-btn">SEND MESSAGE</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection