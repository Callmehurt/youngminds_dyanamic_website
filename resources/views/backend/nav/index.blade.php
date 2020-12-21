@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Navbar Menu
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li class="active">Navbar Menu</li>
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
                                        <h3 class="box-title">Navbar Menu</h3>
                                        <?php

                                        $permission = helperPermissionLink('#', '#');

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="box-body">
                                        <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                <th>Menu Name</th>
                                                <th>Slug</th>
                                                <th>Site URL</th>
                                                <th>Module URL</th>
                                                <th>Menu Type</th>
                                                <th>Status</th>
                                                <th>Parent ID</th>
                                                <th style="width: 10px" ;
                                                    class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                            @forelse($menus as $value)
                                                <tr>
                                                    <th scope=row>{{$i}}</th>
                                                    <td>{{$value->menu_name}}</td>
                                                    <td>{{$value->slug}}</td>
                                                    <td>{{$value->site_url}}</td>
                                                    <td>{{$value->module_url}}</td>
                                                    <td>{{$value->menu_type_id}}</td>
                                                    <td class="text-center">
                                                        @if($value->status== '1')
                                                            <a
                                                                    class="label label-success stat"
                                                                    href="{{route('navbar.changeStatus', $value->id)}}">
                                                                <strong class="stat"> Active
                                                                </strong>
                                                            </a>

                                                        @elseif($value->status== '0')
                                                            <a
                                                                    class="label label-danger stat"
                                                                    href="{{route('navbar.changeStatus', $value->id)}}">
                                                                <strong class="stat"> Inactive
                                                                </strong>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>{{$value->parent_id}}</td>
                                                    <td class="text-right">
                                                        @if($allowEdit)
                                                            <a href="{{route('navbar.edit', $value->id)}}"
                                                               class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>&nbsp;
                                                        @endif

                                                        @if($allowDelete)
                                                            {!! Form::open(['method' => 'post','route'=>['navbar.destroy', $value->id],'class'=> 'inline']) !!}
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

                            @if($allowAdd)

                                <div class="col-md-3">
                                    @if(\Request::segment(5)=='edit')
                                        @include('backend.nav.edit')
                                    @else
                                        @include('backend.nav.add')
                                    @endif
                                </div>
                            @endif

                    </div>
            </div>
        </section>
    </div>
@endsection