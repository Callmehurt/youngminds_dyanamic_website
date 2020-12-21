@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"> Home</a></li>
                <li><a href="#">Roles</a></li>
                <li class="active">Menu</li>
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
                                <h3 class="box-title">Menu</h3>
                                <?php

                                $permission = helperPermission();

                                $allowEdit = $permission['isEdit'];

                                $allowDelete = $permission['isDelete'];

                                $allowAdd = $permission['isAdd'];
                                ?>
                                <a href="{{url('roles/menu')}}" class="pull-right boxTopButton"
                                   data-toggle="tooltip" title="View All"><i class="fa fa-list fa-2x"></i></a>
                                <a href="{{url('roles/menu')}}" class="pull-right  boxTopButton"
                                   data-toggle="tooltip" title="Go Back"><i
                                            class="fa fa-arrow-circle-left fa-2x"></i></a>
                            </div>
                            <div class="box-body">

                                @if(!count($menus)<=0)
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-hover table-striped  table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px">S.N</th>
                                                <th>Menu</th>
                                                <th>Controller/Link</th>
                                                <th class="text-center">Icon</th>
                                                <th style="width: 30px" class="text-centered">Status</th>
                                                <th class="text-right">Order</th>
                                                <th style="width: 50px" class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $i = 1;
                                            ?>
                                            @foreach($menus as $menu)
                                                <tr>
                                                    <th scope=row>{{$i++}}</th>
                                                    <td>{{$menu->menu_name}}</td>
                                                    <td>{{$menu->menu_controller}}<br>{{$menu->menu_link}}</td>

                                                    <td class="text-center">{!! $menu->menu_icon !!}</td>
                                                    <td class="text-center">
                                                        @if($menu->menu_status== '1')
                                                            <a
                                                                    class="label label-success stat"
                                                                    href="{{url('/roles/menu/menuControllerChangeStatus/'.$menu->id)}}">
                                                                <strong class="stat"> Active
                                                                </strong>
                                                            </a>

                                                        @elseif($menu->menu_status== '0')
                                                            <a
                                                                    class="label label-danger stat"
                                                                    href="{{url('/roles/menu/menuControllerChangeStatus/'.$menu->id)}}">
                                                                <strong class="stat"> Inactive
                                                                </strong>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        {{$menu->menu_order}}
                                                    </td>
                                                    @if($allowEdit)
                                                        <td class="text-right">
                                                            <a href="{{route('menu.edit',[$menu->id])}}"
                                                               class="text-info btn btn-xs btn-default"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>&nbsp;
                                                            @endif

                                                            @if($allowDelete)
                                                                {!! Form::open(['method' => 'DELETE', 'class'=>'inline', 'route'=>['menu.destroy',
                                                                    $menu->id]]) !!}
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
                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>


                                @else
                                    {{--<div class="col-md-12">--}}
                                    {{--<label class="form-control label-danger">No records found</label>--}}
                                    {{--</div>--}}
                                @endif

                            </div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                @if($allowAdd)
                    <div class="col-md-3" id="sideForm">
                        @if(\Request::segment(4)=='edit')
                            @include('backend.roles.menus.edit')
                        @else
                            @include('backend.roles.menus.add')
                        @endif

                    </div>
                @endif
        </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection
