@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
                {{--<small>Menu</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"> Home</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="row">
                @if(helperPermission()['isAdd'])
                    <div class="col-md-9" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif

                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">User</h3>
                                        <?php

                                        $permission = helperPermissionLink(url('user'), url('user'));

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];

                                        ?>
                                    </div>
                                    <div class="box-body">
                                        @if(!count($users)<=0)
                                            <div class="table-responsive">
                                                <table id="example1"
                                                       class="table table-striped table-bordered table-hover table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Designation</th>
                                                        <th class="text-center">Status</th>
                                                        <th style="width: 70px;" class="text-right">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <th scope=row>{{$i++}}</th>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->designation->designation_name}}</td>
                                                            <td>
                                                                @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                                                    @if($user->user_status== 'active')

                                                                        <a class="label label-success stat"
                                                                           href="{{url('/user/status',$user->id)}}">
                                                                            <strong class="stat"> Active
                                                                            </strong>
                                                                        </a>

                                                                    @elseif($user->user_status== 'inactive')
                                                                        <a class="label label-danger stat"
                                                                           href="{{url('/user/status',$user->id)}}">
                                                                            <strong class="stat"> Inactive
                                                                            </strong>
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td class="text-right">
                                                                @if($allowEdit)
                                                                    <a href="{{route('user.edit',[$user->id])}}"
                                                                       class="text-info btn btn-xs btn-default"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>&nbsp;
                                                                @endif

                                                                @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)

                                                                    @if($allowDelete)
                                                                        {!! Form::open(['method' => 'DELETE', 'class'=>'inline', 'route'=>['user.destroy',
                                                                            $user->id]]) !!}
                                                                        <button type="submit"
                                                                                class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top" title="Delete"
                                                                                onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    @endif
                                                                    {!! Form::close() !!}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                </table>
                                            </div>


                                        @else
                                            <div class="col-md-12">
                                                <label class="form-control label-danger">No records found</label>
                                            </div>
                                        @endif

                                    </div>

                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            @if($allowAdd)
                                <div class="col-md-3">
                                    @if(\Request::segment(3)=='edit')
                                        @include('backend.users.edit')
                                    @else
                                        @include('backend.users.add')
                                    @endif

                                </div>
                            @endif
                    </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection