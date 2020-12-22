@extends('backend.layouts.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Messages
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li class="active">Messages</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')

            <div class="row">
                <div class="col-md-12" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Messages</h3>
                            <?php

                            $permission = helperPermissionLink('messages', 'messages');
                            $allowDelete = $permission['isDelete'];
                            ?>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">{{trans('app.sn')}}</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th style="width: 10px" ;
                                        class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @forelse($messages as $value)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->message}}</td>
                                        <td class="text-right">
                                            <a href="#"
                                               class="text-info btn btn-xs btn-default" data-toggle="modal" data-target="#mailModal-{{$value->id}}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>&nbsp
                                        @if($allowDelete)
                                                {!! Form::open(['method' => 'post','route'=>['message.destroy', $value->id],'class'=> 'inline']) !!}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs deleteButton actionIcon"
                                                        data-toggle="tooltip"
                                                        data-placement="top" title="Delete"
                                                        onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>

                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @include('backend.pages.message.mailModal')
                                    <?php $i++; ?>
                                @empty
                                @endforelse
                                </tbody>
                            </table>

                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replaceAll( 'edit_textarea' );
    </script>
@endsection