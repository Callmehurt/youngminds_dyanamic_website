@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Feedback
            </h1>
            <ol class="breadcrumb">
                <li><a style="color: gray;" href="{{url('/dashboard')}}"><i
                                class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li><a href="#"> Feedback</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="row">
                <div class="col-md-12" id="listing">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Feedback</h3>
                            <a href="{{url('/feedback/create')}}" class="pull-right boxTopButton" id="add" data-toggle="tooltip"
                               title="Add New"><i class="fa fa-plus-circle fa-2x"></i></a>

                            <a href="{{url('/feedback')}}" class="pull-right boxTopButton" data-toggle="tooltip"
                               title="View All"><i class="fa fa-list fa-2x"></i></a>

                            <a href="{{URL::previous()}}" class="pull-right boxTopButton" data-toggle="tooltip" title="Go Back">
                                <i class="fa fa-arrow-circle-left fa-2x"></i></a>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['method'=>'post','url'=>'feedback','enctype'=>'multipart/form-data','file'=>true]) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6 {{ ($errors->has('category'))?'has-error':'' }}">
                                            <label>Type
                                            </label>
                                            {!! Form::select('category',$categories,null,['id' => 'complainerType','style' => 'width:100%','class'=>'form-control select2','placeholder'=>'Please Select Category
                                                    Type']) !!}
                                            {!! $errors->first('category', '<span class="label label-danger">:message</span>') !!}
                                        </div>

                                        <div class="form-group col-md-6 {{ ($errors->has('title'))?'has-error':'' }}">
                                            <label for="feature">Title</label>
                                            {{ Form::text('title',null,['placeholder'=>'Write Down','class' => 'form-control']) }}
                                            {!! $errors->first('title', '<span class="label label-danger">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ ($errors->has('url'))?'has-error':'' }}">
                                        <label for="feature">URL</label><br>
                                        {{ Form::text('url',null,['placeholder'=>'Please Enter Url','class' => 'form-control']) }}
                                        {!! $errors->first('url', '<span class="label label-danger">:message</span>') !!}
                                    </div>

                                    <div class="form-group {{ ($errors->has('description'))?'has-error':'' }}">
                                        <label for="feature">Description </label><br>
                                        {{ Form::textarea('description',null,['placeholder'=>'Write Down','class' => 'textarea', 'style'=>'width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px']) }}
                                        {!! $errors->first('description', '<span class="label label-danger">:message</span>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('attachment','Files / Attachment')}}
                                        {{Form::file('attachment[]', array('class' => 'form-control','multiple' => 'true'))}}
                                        {!! $errors->first('attachment.*', '<span class="label label-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            {{trans('app.save')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('js')

@endsection
