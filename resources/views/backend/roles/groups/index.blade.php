@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles
                {{--<small>Menu</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"> Home</a></li>
                <li><a href="#">Roles</a></li>
                <li class="active">Groups</li>
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
                                        <h3 class="box-title">Groups</h3>
                                        <?php

                                        $permission = helperPermission();

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];
                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                        <a href="{{url('roles/group')}}" class="pull-right boxTopButton"
                                           data-toggle="tooltip" title="View All"><i class="fa fa-list fa-2x"></i></a>
                                        <a href="{{url('roles/group')}}" class="pull-right  boxTopButton"
                                           data-toggle="tooltip" title="Go Back"><i
                                                    class="fa fa-arrow-circle-left fa-2x"></i></a>

                                    </div>
                                    <div class="box-body">

                                        @if(!count($groups)<=0)
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-hover table-striped table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">S.N</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                        <th style="width: 50px" class="text-right">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @foreach($groups as $group)
                                                        <tr>
                                                            <th scope=row>{{$i++}}</th>
                                                            <td>{{$group->group_name}}</td>
                                                            <td>{{$group->group_details}}</td>

                                                            <td class="text-right">
                                                                @if($allowEdit)
                                                                    <a href="{{route('group.edit',[$group->id])}}"
                                                                       class="text-info btn btn-xs btn-default"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>&nbsp;
                                                                @endif


                                                                @if($allowDelete)
                                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['group.destroy',$group->id],'class'=>'inline']) !!}

                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                            data-toggle="tooltip"
                                                                            data-placement="top" title="Delete"
                                                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                @endif

                                                                {!! Form::close() !!}
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
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.roles.groups.edit')
                                    @else
                                        @include('backend.roles.groups.add')
                                    @endif

                                </div>
                            @endif
                    </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection