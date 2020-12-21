
@extends('backend.layouts.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pages
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li class="active">Pages</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')

            <div class="row justify-content-center">

                @if(helperPermission()['isAdd'])

                    <div class="col-md-12" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add Page</h3>
                                        <?php

                                        $permission = helperPermissionLink('#', '#');

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::model($edits,['method'=>'PUT','enctype' => 'multipart/form-data', 'route' => ['page.update', $edits->id]]) !!}


                                        <div class="form-group {{ ($errors->has('page_name'))?'has-error':'' }}">
                                            <label>Page Name
                                                <label class="text-danger"> *</label>
                                            </label>
                                        {!! Form::text('page_name',null,['class'=>'form-control','placeholder' => 'Eg: Introduction, About', 'name' => 'page_name']) !!}
                                        {!! $errors->first('page_name', '<span class="text-danger">:message</span>') !!}
                                        <!-- /.input group -->
                                        </div>

                                        <div class="form-group {{ ($errors->has('site_url'))?'has-error':'' }}">
                                            <label>Page Title
                                                <label class="text-danger"> *</label>
                                            </label>
                                        {!! Form::text('page_title',null,['class'=>'form-control','name' => 'page_title']) !!}
                                        {!! $errors->first('page_title', '<span class="text-danger">:message</span>') !!}
                                        <!-- /.input group -->
                                        </div>

                                        <div class="form-group {{ ($errors->has('module_url'))?'has-error':'' }}">
                                            <label>Page Content
                                                <label class="text-danger"> *</label>
                                            </label>
                                        {!! Form::textarea('page_content',null,['class'=>'form-control','name' => 'page_content', 'id' => 'page_content']) !!}
                                        {!! $errors->first('page_content', '<span class="text-danger">:message</span>') !!}
                                        <!-- /.input group -->
                                        </div>


                                        <div class="box-footer">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
                                            </div>
                                            <!-- /.box-footer -->
                                        </div>
                                        {!! Form::close() !!}


                                    </div>
                                </div>
                            </div>

                    </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'page_content', {
            filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',
        });
    </script>
@endsection


